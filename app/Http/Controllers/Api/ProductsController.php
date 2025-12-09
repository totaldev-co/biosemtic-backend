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
    public function categories(): Response
    {
        $data = ProductCategory::getCached();

        if (empty($data)) {
            return RB::error(404, null, null, 404);
        }

        return RB::success($data);
    }

    public function index(Request $request): Response
    {
        $perPage = min((int) $request->get('per_page', 12), 50);
        $search = $request->get('search');
        $categorySlug = $request->get('category');

        $query = Product::forApi();

        if ($categorySlug && $categorySlug !== 'todos') {
            $query->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

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

    public function faqs(): Response
    {
        $data = ProductFaq::getCached();

        if (empty($data)) {
            return RB::error(404, null, null, 404);
        }

        return RB::success($data);
    }
}
