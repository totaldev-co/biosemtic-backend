<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductFaq;
use Illuminate\Http\Request;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder as RB;
use Symfony\Component\HttpFoundation\Response;

class ProductsController extends Controller
{
    /**
     * Obtener todas las categorías de productos
     * GET /api/products/categories
     */
    public function categories(): Response
    {
        $data = ProductCategory::getCached();

        if (empty($data)) {
            return RB::error(404, null, null, 404);
        }

        return RB::success($data);
    }

    /**
     * Obtener productos con paginación, búsqueda y filtro por categoría
     * GET /api/products
     *
     * Query params:
     * - page: número de página (default: 1)
     * - per_page: productos por página (default: 12)
     * - search: búsqueda por nombre o descripción
     * - category: slug de la categoría para filtrar
     */
    public function index(Request $request): Response
    {
        $perPage = min((int) $request->get('per_page', 12), 50);
        $search = $request->get('search');
        $categorySlug = $request->get('category');

        $query = Product::forApi();

        // Filtrar por categoría si se proporciona
        if ($categorySlug && $categorySlug !== 'todos') {
            $query->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        // Búsqueda por nombre o descripción
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $paginator = $query->paginate($perPage);

        $items = collect($paginator->items())
            ->map(fn($product) => $product->toApiArray())
            ->toArray();

        return RB::success([
            'items' => $items,
            'pagination' => [
                'current_page' => $paginator->currentPage(),
                'per_page' => $paginator->perPage(),
                'total' => $paginator->total(),
                'total_pages' => $paginator->lastPage(),
                'has_more' => $paginator->hasMorePages(),
            ],
        ]);
    }

    /**
     * Obtener productos por categoría (legacy - mantener compatibilidad)
     * GET /api/products/category/{slug}
     */
    public function byCategory(string $slug): Response
    {
        $category = ProductCategory::where('slug', $slug)
            ->where('is_active', true)
            ->first();

        if (!$category) {
            return RB::error(404, null, null, 404);
        }

        $products = Product::forApi()
            ->where('category_id', $category->id)
            ->get()
            ->map(fn($product) => $product->toApiArray())
            ->toArray();

        return RB::success([
            'category' => $category->toApiArray(),
            'products' => $products,
        ]);
    }

    /**
     * Obtener detalle de un producto
     * GET /api/products/{id}
     */
    public function show(string $id): Response
    {
        $product = Product::with(['category', 'images'])
            ->where('is_active', true)
            ->find($id);

        if (!$product) {
            return RB::error(404, null, null, 404);
        }

        return RB::success($product->toDetailApiArray());
    }

    /**
     * Obtener las preguntas frecuentes de productos
     * GET /api/products/faqs
     */
    public function faqs(): Response
    {
        $data = ProductFaq::getCached();

        if (empty($data)) {
            return RB::error(404, null, null, 404);
        }

        return RB::success($data);
    }
}
