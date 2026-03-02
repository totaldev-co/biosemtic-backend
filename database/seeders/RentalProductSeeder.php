<?php

namespace Database\Seeders;

use App\Models\RentalProduct;
use App\Models\RentalProductCategory;
use App\Models\RentalProductImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RentalProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = RentalProductCategory::all()->keyBy('slug');

        $products = [
            [
                'category' => 'cpre',
                'name' => 'Papilótomo o esfinterótomo triple lumen de Arco o nariz',
                'description' => 'Canal mínimo de trabajo: 2,8 mm, longitud de la punta:0,5 mm, Diámetro externo de la punta 1,6 mm, longitud del alambre de corte de 20 mm, recubierto. longitud de trabajo 1800 mm.',
                'images' => [
                    'service-items/rent/detailed/PROCEDIMIENTOS CPRE (COLANGIO PANCREATOGRAFIA RETROGRADA ENDOSCOPICA)/Papilotomo/PAPILOTOMO DE CORTE O PUNTA 1.1.jpg',
                ],
            ],
            [
                'category' => 'cpre',
                'name' => 'Guía hidrofílica recta rigida',
                'description' => 'Diámetro 0.025 pulgadas, longitud 450 cm',
                'images' => [
                    'service-items/rent/detailed/PROCEDIMIENTOS CPRE (COLANGIO PANCREATOGRAFIA RETROGRADA ENDOSCOPICA)/Guía hidrofílica/GUIA HIDROFILICA 1.1.jpg',
                ],
            ],
            [
                'category' => 'cpre',
                'name' => 'Balón de Extracción de Cálculos pequeño',
                'description' => 'Triple-lumen con inflado de balón a 13, 15 y 18 mm, compatible con guía hidrofílica de 0,035"; longitud total de trabajo 200 cm, Canal mínimo de trabajo:3,7mm. Diámetro externo del catéter: 2,4 mm. Sistema de Intercambio Rápido',
                'images' => [
                    'service-items/rent/detailed/PROCEDIMIENTOS CPRE (COLANGIO PANCREATOGRAFIA RETROGRADA ENDOSCOPICA)/Canastilla de Extracción/CANASTILLA DE EXTRACCION DE CALCULOS 1.1.png',
                ],
            ],
            [
                'category' => 'cpre',
                'name' => 'Canastilla de Extracción de Cálculos',
                'description' => 'Elaborada en Nitinol, longitud de trabajo: de 1950 mm, canal de trabajo min: 3,7 mm; tamaño de la cesta de 25 mm X 50 mm. Diámetro externo del catéter: 3,2 mm.',
                'images' => [
                    'service-items/rent/detailed/PROCEDIMIENTOS CPRE (COLANGIO PANCREATOGRAFIA RETROGRADA ENDOSCOPICA)/Canastilla de Extracción/CANASTILLA DE EXTRACCION DE CALCULOS  HELICOIDAL 1.1.png',
                ],
            ],
            [
                'category' => 'retiro-cuerpo-extrano',
                'name' => 'Pinza de Extracción de Cuerpo Extraño',
                'description' => 'Longitud de trabajo: 230 cm, Canal mínimo de trabajo: 2,0 mm, Mandíbula Diente de Ratón, Diámetro externo de las copas:1.8 mm, apertura de 4,6 mm, Recubierta, No Rotable.',
                'images' => [],
            ],
            [
                'category' => 'biopsia',
                'name' => 'Pinza de Biopsia para Broncoscopia o Gastroscopia Pediátrica',
                'description' => 'Longitud de Trabajo: 160 cm, Canal mínimo de trabajo: 2.0 mm, Diámetro externo de las copas: 1.8 mm, Tipo de la copa: COCODRILO, Apertura de la copa: 5,6 mm, Sin estilete, RECUBIERTA.',
                'images' => [],
            ],
            [
                'category' => 'biopsia',
                'name' => 'Pinza de Biopsia para Gastroscopia',
                'description' => 'Longitud de Trabajo: 160 cm, Canal mínimo de trabajo: 2.8 mm, Diámetro externo de las copas: 2,3 mm, Tipo de la copa: Liso, Apertura de la copa:6,5 mm, Sin estilete, Basculante, NO RECUBIERTA.',
                'images' => [],
            ],
            [
                'category' => 'hemostasia',
                'name' => 'Aguja para Escleroterapia',
                'description' => 'Longitud de trabajo: 230 cm, Diámetro Externo de la vaina o camisa: 2.4 mm, Canal mínimo de trabajo:2,8 mm, Aguja de 21 Gauge y Longitud de 4 mm. Punta Redondeada en Poli-Propileno.',
                'images' => [
                    'service-items/rent/detailed/INSUMOS PARA HEMOSTASIA/Clip Hemostático/HEMOCLIP 1.1.jpg',
                ],
            ],
            [
                'category' => 'hemostasia',
                'name' => 'Clip Hemostático',
                'description' => 'Pre-montado, Sin Recubrimiento, Longitud de trabajo: 230 cm, Canal mínimo de trabajo: 2.8 mm, Diámetro externo del clip: 2.6 mm, Rotable, Reposicionable, Máxima Apertura del Clip: 16 mm con ángulo de cierre de 90°.',
                'images' => [
                    'service-items/rent/detailed/INSUMOS PARA HEMOSTASIA/Clip Hemostático/HEMOCLIP 1.2.jpg',
                ],
            ],
            [
                'category' => 'hemostasia',
                'name' => 'KIT LIGADOR DE VARICES ESOFÁGICAS',
                'description' => 'INCLUYE APLICADOR, BARRIL CON 6 BANDAS',
                'images' => [],
            ],
            [
                'category' => 'polipectomia',
                'name' => 'Asa de Polipectomía en ESCUDO - HIBRIDA',
                'description' => 'Para la extracción de pólipos, Longitud de trabajo: 230 cm, Canal mínimo de trabajo: 2,8 mm, Diámetro externo de la vaina o camisa: 2.4 mm, Ancho o apertura del asa: 15 mm. Diámetro del alambre:0,3 mm. ROTABLE.',
                'images' => [],
            ],
            [
                'category' => 'polipectomia',
                'name' => 'Asa de Polipectomía OVALADA FRIA',
                'description' => 'Para la extracción de pólipos, Longitud de trabajo: 230 cm, Canal mínimo de trabajo: 2,8 mm, Diámetro externo de la vaina o camisa: 2.4 mm, Ancho o apertura del asa: 10 mm. Diámetro del alambre:0,3 mm. ROTABLE.',
                'images' => [],
            ],
            [
                'category' => 'gastrostomia-peg',
                'name' => 'Kit de Gastrostomía Endoscópica Percutánea de 20 Fr- LUXURY- Método Pull',
                'description' => 'El kit incluye: abrazadera para tubo, adaptador de alimentación, adaptador de alimentación con cierre Luer, aguja 19g, aguja 25g, aguja introductora, anillo de retención, asa de polipectomía, bisturí desechable, cable guía de colocación, campo fenestrado, gasas, jeringa, pinzas, tijeras y tubo de tracción extraíble pull y tubo de gastrostomía, Producto Desechable y se suministra ESTERIL.',
                'images' => [],
            ],
            [
                'category' => 'reprocesamiento',
                'name' => 'Cepillo Desechable para Reprocesamiento de Endoscopios',
                'description' => 'Diámetro externo de la camisa o vaina: 1,6 mm, Longitud de trabajo: 220 cm, Longitud del cepillo: 20 mm, Canal de limpieza: 2.0 /2.8 mm. INCLUYE Cepillo para reprocesamiento de canal de canales.',
                'images' => [],
            ],
            [
                'category' => 'videolaringoscopio',
                'name' => 'HOJA VIDEOLARINGOSCOPIO MAC 3 (ADULTO)',
                'description' => 'HOJA VIDEOLARINGOSCOPIO MAC 3 (ADULTO)',
                'images' => [
                    'service-items/rent/detailed/EQUIPOS MEDICOS/VIDEO LARINGOSCOPIO.jpg',
                ],
            ],
            [
                'category' => 'stent-esofagico',
                'name' => 'STENT ESOFAGICO AUTOEXPANDIBLE PARCIALMENTE CUBIERTO EN AMBOS EXTREMOS',
                'description' => 'STENT ESOFAGICO AUTOEXPANDIBLE PARCIALMENTE CUBIERTO EN AMBOS EXTREMOS.',
                'images' => [
                    'service-items/rent/detailed/STENT AUTOEXPANDIBLES ESOFAGICOS/EPB/EPB_1ncn.png',
                ],
            ],
            [
                'category' => 'stent-biliar',
                'name' => 'STENT BILIAR AUTOEXPANDIBLE COMPLETAMENTE CUBIERTO DOBLE LAZO CON FLAP',
                'description' => 'STENT BILIAR AUTOEXPANDIBLE COMPLETAMENTE CUBIERTO DOBLE LAZO CON FLAP, LAZO EN LA PARTE PROXIMAL PARA LA EXTRACCIÓN DEL STENT Y LAZO LARGO PARA LA EXTRACCIÓN DEL STENT DE ADENTRO HACIA AFUERA.',
                'images' => [
                    'service-items/rent/detailed/STENT AUTOEXPANDIBLE BILIAR/BCT/BCT flap lasso ccc.jpg',
                ],
            ],
            [
                'category' => 'stent-duodenal',
                'name' => 'STENT DUODENAL/ PILORICO AUTOEXPANDIBLE NO RECUBIERTO DNZL',
                'description' => 'STENT DUODENAL/ PILORICO AUTOEXPANDIBLE NO RECUBIERTO, LAZO EN EL EXTREMO PROXIMAL, DOBLE MALLADO TTS.',
                'images' => [
                    'service-items/rent/detailed/STENT AUTOEXPANDIBLE DUODENAL-PILORICO/DNZL/DNZL_2nnn.jpg',
                ],
            ],
            [
                'category' => 'stent-colon',
                'name' => 'STENT AUTOEXPANDIBLE NO RECUBIERTO DOBLE MALLADO TTS CNZ',
                'description' => 'STENT AUTOEXPANDIBLE NO RECUBIERTO DOBLE MALLADO TTS, LAZO EN LA PARTE PROXIMAL.',
                'images' => [
                    'service-items/rent/detailed/STENT AUTOEXPANDIBLE COLON-RECTAL/CNZ/CNZ -lasso nn.jpg',
                ],
            ],
            [
                'category' => 'limpieza-desinfeccion',
                'name' => 'MADACIDE –1',
                'description' => 'Limpiador y desinfectante, a base de amonios cuaternarios de 3 y 4 generación. Para equipos y dispositivos médicos, todo tipo de superficies y áreas de procedimientos médicos. De uso hospitalario. MARCA: LP ADVANCED',
                'images' => [],
            ],
        ];

        $order = 1;
        foreach ($products as $productData) {
            $category = $categories->get($productData['category']);

            if (!$category) {
                continue;
            }

            $product = RentalProduct::updateOrCreate(
                ['slug' => Str::slug($productData['name'])],
                [
                    'category_id' => $category->id,
                    'name' => $productData['name'],
                    'description' => $productData['description'],
                    'order' => $order++,
                    'is_active' => true,
                ]
            );

            $product->images()->delete();

            foreach ($productData['images'] as $imgOrder => $imagePath) {
                RentalProductImage::create([
                    'rental_product_id' => $product->id,
                    'image_path' => $imagePath,
                    'alt_text' => $productData['name'],
                    'order' => $imgOrder,
                ]);
            }
        }
    }
}
