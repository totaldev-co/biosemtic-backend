<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ProductCategory::all()->keyBy('slug');

        $products = [
            [
                'category' => 'cpre',
                'name' => 'Papilótomo o esfinterótomo triple lumen de Arco o nariz',
                'description' => 'Canal mínimo de trabajo: 2,8 mm, longitud de la punta:0,5 mm, Diámetro externo de la punta 1,6 mm, longitud del alambre de corte de 20 mm, recubierto. longitud de trabajo 1800 mm.',
                'images' => [
                    'products/detailed/PROCEDIMIENTOS CPRE (COLANGIO PANCREATOGRAFIA RETROGRADA ENDOSCOPICA)/Papilotomo/PAPILOTOMO DE CORTE O PUNTA 1.1.jpg',
                    'products/detailed/PROCEDIMIENTOS CPRE (COLANGIO PANCREATOGRAFIA RETROGRADA ENDOSCOPICA)/Papilotomo/PAPILOTOMO DE CORTE O PUNTA 1.2.jpg',
                    'products/detailed/PROCEDIMIENTOS CPRE (COLANGIO PANCREATOGRAFIA RETROGRADA ENDOSCOPICA)/Papilotomo/PAPILOTOMO DE CORTE O PUNTA 1.3.jpg',
                    'products/detailed/PROCEDIMIENTOS CPRE (COLANGIO PANCREATOGRAFIA RETROGRADA ENDOSCOPICA)/Papilotomo/PAPILOTOMO DE CORTE O PUNTA 1.4.jpg',
                    'products/detailed/PROCEDIMIENTOS CPRE (COLANGIO PANCREATOGRAFIA RETROGRADA ENDOSCOPICA)/Papilotomo/PAPILOTOMO DE CORTE O PUNTA 1.5.jpg',
                ],
            ],
            [
                'category' => 'cpre',
                'name' => 'Guía hidrofílica recta rigida',
                'description' => 'Diámetro 0.025 pulgadas, longitud 450 cm',
                'images' => [
                    'products/detailed/PROCEDIMIENTOS CPRE (COLANGIO PANCREATOGRAFIA RETROGRADA ENDOSCOPICA)/Guía hidrofílica/GUIA HIDROFILICA 1.1.jpg',
                    'products/detailed/PROCEDIMIENTOS CPRE (COLANGIO PANCREATOGRAFIA RETROGRADA ENDOSCOPICA)/Guía hidrofílica/GUIA HIDROFILICA 1.2.jpg',
                    'products/detailed/PROCEDIMIENTOS CPRE (COLANGIO PANCREATOGRAFIA RETROGRADA ENDOSCOPICA)/Guía hidrofílica/GUIA HIDROFILICA 1.3.jpg',
                    'products/detailed/PROCEDIMIENTOS CPRE (COLANGIO PANCREATOGRAFIA RETROGRADA ENDOSCOPICA)/Guía hidrofílica/GUIA HIDROFILICA 1.4.jpg',
                ],
            ],
            [
                'category' => 'cpre',
                'name' => 'Balón de Extracción de Cálculos pequeño',
                'description' => 'Triple-lumen con inflado de balón a 13, 15 y 18 mm, compatible con guía hidrofílica de 0,035"; longitud total de trabajo 200 cm, Canal mínimo de trabajo:3,7mm. Diámetro externo del catéter: 2,4 mm. Sistema de Intercambio Rápido',
                'images' => [
                    'products/detailed/PROCEDIMIENTOS CPRE (COLANGIO PANCREATOGRAFIA RETROGRADA ENDOSCOPICA)/Balón de Extracción/BALON DE EXTRACCION DE CALCULO 1.1.JPG',
                    'products/detailed/PROCEDIMIENTOS CPRE (COLANGIO PANCREATOGRAFIA RETROGRADA ENDOSCOPICA)/Balón de Extracción/BALON DE EXTRACCION DE CALCULO 1.2.JPG',
                    'products/detailed/PROCEDIMIENTOS CPRE (COLANGIO PANCREATOGRAFIA RETROGRADA ENDOSCOPICA)/Balón de Extracción/BALON DE EXTRACCION DE CALCULO 1.3.JPG',
                    'products/detailed/PROCEDIMIENTOS CPRE (COLANGIO PANCREATOGRAFIA RETROGRADA ENDOSCOPICA)/Balón de Extracción/BALON DE EXTRACCION DE CALCULO 1.4.JPG',
                    'products/detailed/PROCEDIMIENTOS CPRE (COLANGIO PANCREATOGRAFIA RETROGRADA ENDOSCOPICA)/Balón de Extracción/BALON DE EXTRACCION DE CALCULO 1.5.JPG',
                ],
            ],
            [
                'category' => 'cpre',
                'name' => 'Canastilla de Extracción de Cálculos',
                'description' => 'Elaborada en Nitinol, longitud de trabajo: de 1950 mm, canal de trabajo min: 3,7 mm; tamaño de la cesta de 25 mm X 50 mm. Diámetro externo del catéter: 3,2 mm.',
                'images' => [
                    'products/detailed/PROCEDIMIENTOS CPRE (COLANGIO PANCREATOGRAFIA RETROGRADA ENDOSCOPICA)/Canastilla de Extracción/CANASTILLA DE EXTRACCION DE CALCULOS  HELICOIDAL 1.1.png',
                    'products/detailed/PROCEDIMIENTOS CPRE (COLANGIO PANCREATOGRAFIA RETROGRADA ENDOSCOPICA)/Canastilla de Extracción/CANASTILLA DE EXTRACCION DE CALCULOS  HELICOIDAL 1.2.png',
                    'products/detailed/PROCEDIMIENTOS CPRE (COLANGIO PANCREATOGRAFIA RETROGRADA ENDOSCOPICA)/Canastilla de Extracción/CANASTILLA DE EXTRACCION DE CALCULOS  HELICOIDAL 1.3.png',
                    'products/detailed/PROCEDIMIENTOS CPRE (COLANGIO PANCREATOGRAFIA RETROGRADA ENDOSCOPICA)/Canastilla de Extracción/CANASTILLA DE EXTRACCION DE CALCULOS 1.1.png',
                    'products/detailed/PROCEDIMIENTOS CPRE (COLANGIO PANCREATOGRAFIA RETROGRADA ENDOSCOPICA)/Canastilla de Extracción/CANASTILLA DE EXTRACCION DE CALCULOS1.2.png',
                ],
            ],
            [
                'category' => 'retiro-cuerpo-extrano',
                'name' => 'Pinza de Extracción de Cuerpo Extraño',
                'description' => 'Longitud de trabajo: 230 cm, Canal mínimo de trabajo: 2,0 mm, Mandíbula Diente de Ratón, Diámetro externo de las copas:1.8 mm, apertura de 4,6 mm, Recubierta, No Rotable.',
                'images' => [
                    'products/detailed/INSUMOS PARA RETIRO DE CUERPO EXTRAÑO/PINZA DE CUERPO EXTRAÑO1.2.JPG',
                    'products/detailed/INSUMOS PARA RETIRO DE CUERPO EXTRAÑO/PINZA DE CUERPO EXTRAÑO1.3.JPG',
                    'products/detailed/INSUMOS PARA RETIRO DE CUERPO EXTRAÑO/PINZA DE CUERPO EXTRAÑO1.4.JPG',
                    'products/detailed/INSUMOS PARA RETIRO DE CUERPO EXTRAÑO/PINZA DE CUERPO EXTRAÑO1.5.JPG',
                    'products/detailed/INSUMOS PARA RETIRO DE CUERPO EXTRAÑO/PINZA DE CUERPO EXTRAÑO1.6.JPG',
                    'products/detailed/INSUMOS PARA RETIRO DE CUERPO EXTRAÑO/PINZA DE CUERPO EXTRAÑO1.7.JPG',
                ],
            ],
            [
                'category' => 'biopsia',
                'name' => 'Pinza de Biopsia para Broncoscopia o Gastroscopia Pediátrica',
                'description' => 'Longitud de Trabajo: 160 cm, Canal mínimo de trabajo: 2.0 mm, Diámetro externo de las copas: 1.8 mm, Tipo de la copa: COCODRILO, Apertura de la copa: 5,6 mm, Sin estilete, RECUBIERTA.',
                'images' => [
                    'products/detailed/INSUMOS PARA TOMA DE BIOPSIA/PINZA DE BIOPSIA RECUBIERTA1.2.JPG',
                    'products/detailed/INSUMOS PARA TOMA DE BIOPSIA/PINZA DE BIOPSIA RECUBIERTA1.3.JPG',
                    'products/detailed/INSUMOS PARA TOMA DE BIOPSIA/PINZA DE BIOPSIA RECUBIERTA1.4.JPG',
                    'products/detailed/INSUMOS PARA TOMA DE BIOPSIA/PINZA DE BIOPSIA RECUBIERTA1.5.JPG',
                ],
            ],
            [
                'category' => 'biopsia',
                'name' => 'Pinza de Biopsia para Gastroscopia',
                'description' => 'Longitud de Trabajo: 160 cm, Canal mínimo de trabajo: 2.8 mm, Diámetro externo de las copas: 2,3 mm, Tipo de la copa: Liso, Apertura de la copa:6,5 mm, Sin estilete, Basculante, NO RECUBIERTA.',
                'images' => [
                    'products/detailed/INSUMOS PARA TOMA DE BIOPSIA/no recubierta/PINZA DE BIOPSIA  NO RECUBIERTA1.1.JPG',
                    'products/detailed/INSUMOS PARA TOMA DE BIOPSIA/no recubierta/PINZA DE BIOPSIA  NO RECUBIERTA1.2.JPG',
                    'products/detailed/INSUMOS PARA TOMA DE BIOPSIA/no recubierta/PINZA DE BIOPSIA  NO RECUBIERTA1.3.JPG',
                    'products/detailed/INSUMOS PARA TOMA DE BIOPSIA/no recubierta/PINZA DE BIOPSIA  NO RECUBIERTA1.4.JPG',
                ],
            ],
            [
                'category' => 'hemostasia',
                'name' => 'Aguja para Escleroterapia',
                'description' => 'Longitud de trabajo: 230 cm, Diámetro Externo de la vaina o camisa: 2.4 mm, Canal mínimo de trabajo:2,8 mm, Aguja de 21 Gauge y Longitud de 4 mm. Punta Redondeada en Poli-Propileno.',
                'images' => [
                    'products/detailed/INSUMOS PARA HEMOSTASIA/Agujas/AGUJA DE ESCLEROTERAPIA1.1.JPG',
                    'products/detailed/INSUMOS PARA HEMOSTASIA/Agujas/AGUJA DE ESCLEROTERAPIA 1.2.JPG',
                    'products/detailed/INSUMOS PARA HEMOSTASIA/Agujas/AGUJA DE ESCLEROTERAPIA1.3.JPG',
                ],
            ],
            [
                'category' => 'hemostasia',
                'name' => 'Clip Hemostático',
                'description' => 'Pre-montado, Sin Recubrimiento, Longitud de trabajo: 230 cm, Canal mínimo de trabajo: 2.8 mm, Diámetro externo del clip: 2.6 mm, Rotable, Reposicionable, Máxima Apertura del Clip: 16 mm con ángulo de cierre de 90°.',
                'images' => [
                    'products/detailed/INSUMOS PARA HEMOSTASIA/Clip Hemostático/HEMOCLIP 1.1.jpg',
                    'products/detailed/INSUMOS PARA HEMOSTASIA/Clip Hemostático/HEMOCLIP 1.2.jpg',
                    'products/detailed/INSUMOS PARA HEMOSTASIA/Clip Hemostático/HEMOCLIP 1.3.jpg',
                    'products/detailed/INSUMOS PARA HEMOSTASIA/Clip Hemostático/HEMOCLIP 1.4.jpg',
                    'products/detailed/INSUMOS PARA HEMOSTASIA/Clip Hemostático/HEMOCLIP 1.5.jpg',
                    'products/detailed/INSUMOS PARA HEMOSTASIA/Clip Hemostático/HEMOCLIP 1.6.jpg',
                    'products/detailed/INSUMOS PARA HEMOSTASIA/Clip Hemostático/HEMOCLIP 1.7.jpg',
                ],
            ],
            [
                'category' => 'hemostasia',
                'name' => 'KIT LIGADOR DE VARICES ESOFÁGICAS',
                'description' => 'INCLUYE APLICADOR, BARRIL CON 6 BANDAS',
                'images' => [],
            ],
            [
                'category' => 'hemostasia',
                'name' => 'BARRIL DE REEMPLAZO',
                'description' => 'PARA KIT VARICES ESOFÁGICAS INCLUYE APLICADOR, BARRIL CON 6 BANDAS',
                'images' => [],
            ],
            [
                'category' => 'polipectomia',
                'name' => 'Asa de Polipectomía en ESCUDO - HIBRIDA',
                'description' => 'Para la extracción de pólipos, Longitud de trabajo: 230 cm, Canal mínimo de trabajo: 2,8 mm, Diámetro externo de la vaina o camisa: 2.4 mm, Ancho o apertura del asa: 15 mm. Diámetro del alambre:0,3 mm. ROTABLE.',
                'images' => [
                    'products/detailed/INSUMOS PARA POLIPECTOMIA/hibrida/ASA DE POLIPECTOMIA HIBRIDA1.1.JPG',
                    'products/detailed/INSUMOS PARA POLIPECTOMIA/hibrida/ASA DE POLIPECTOMIA HIBRIDA1.2.JPG',
                    'products/detailed/INSUMOS PARA POLIPECTOMIA/hibrida/ASA DE POLIPECTOMIA HIBRIDA1.3.JPG',
                ],
            ],
            [
                'category' => 'polipectomia',
                'name' => 'Asa de Polipectomía OVALADA FRIA',
                'description' => 'Para la extracción de pólipos, Longitud de trabajo: 230 cm, Canal mínimo de trabajo: 2,8 mm, Diámetro externo de la vaina o camisa: 2.4 mm, Ancho o apertura del asa: 10 mm. Diámetro del alambre:0,3 mm. ROTABLE.',
                'images' => [
                    'products/detailed/INSUMOS PARA POLIPECTOMIA/ASA DE POLIPECTOMIA FRIA1.1.JPG',
                    'products/detailed/INSUMOS PARA POLIPECTOMIA/ASA DE POLIPECTOMIA FRIA1.2.JPG',
                    'products/detailed/INSUMOS PARA POLIPECTOMIA/ASA DE POLIPECTOMIA FRIA1.3.JPG',
                ],
            ],
            [
                'category' => 'gastrostomia-peg',
                'name' => 'Kit de Gastrostomía Endoscópica Percutánea de 20 Fr- LUXURY- Método Pull',
                'description' => 'El kit incluye: abrazadera para tubo, adaptador de alimentación, adaptador de alimentación con cierre Luer, aguja 19g, aguja 25g, aguja introductora, anillo de retención, asa de polipectomía, bisturí desechable, cable guía de colocación, campo fenestrado, gasas, jeringa, pinzas, tijeras y tubo de tracción extraíble pull y tubo de gastrostomía, Producto Desechable y se suministra ESTERIL.',
                'images' => [],
            ],
            [
                'category' => 'gastrostomia-peg',
                'name' => 'Kit de Gastrostomía Endoscópica Percutánea de 24 Fr- LUXURY- Método Pull',
                'description' => 'El kit incluye: abrazadera para tubo, adaptador de alimentación, adaptador de alimentación con cierre Luer, aguja 19g, aguja 25g, aguja introductora, anillo de retención, asa de polipectomía, bisturí desechable, cable guía de colocación, campo fenestrado, gasas, jeringa, pinzas, tijeras y tubo de tracción extraíble pull y tubo de gastrostomía, Producto Desechable y se suministra ESTERIL.',
                'images' => [],
            ],
            [
                'category' => 'gastrostomia-peg',
                'name' => 'Tubo de Reemplazo para Gastrostomía Endoscópica Percutánea de 20 Fr',
                'description' => 'Material: silicona grado médico, producto Desechable.',
                'images' => [],
            ],
            [
                'category' => 'gastrostomia-peg',
                'name' => 'Tubo de Reemplazo para Gastrostomía Endoscópica Percutánea de 22 Fr',
                'description' => 'Material: silicona grado médico, producto Desechable.',
                'images' => [],
            ],
            [
                'category' => 'gastrostomia-peg',
                'name' => 'Tubo de Reemplazo para Gastrostomía Endoscópica Percutánea de 24 Fr',
                'description' => 'Material: silicona grado médico, producto Desechable.',
                'images' => [],
            ],
            [
                'category' => 'reprocesamiento',
                'name' => 'Cepillo Desechable para Reprocesamiento de Endoscopios',
                'description' => 'Diámetro externo de la camisa o vaina: 1,6 mm, Longitud de trabajo: 220 cm, Longitud del cepillo: 20 mm, Canal de limpieza: 2.0 /2.8 mm. INCLUYE Cepillo para reprocesamiento de canal de canales.',
                'images' => [
                    'products/detailed/INSUMOS PARA REPROCESAMIENTO Y VARIOS/Cepillo Desechable/CEPILLO DE REPROCESAMIENTO1.1.JPG',
                    'products/detailed/INSUMOS PARA REPROCESAMIENTO Y VARIOS/Cepillo Desechable/CEPILLO DE REPROCESAMIENTO1.2.JPG',
                    'products/detailed/INSUMOS PARA REPROCESAMIENTO Y VARIOS/Cepillo Desechable/CEPILLO DE REPROCESAMIENTO1.3.JPG',
                    'products/detailed/INSUMOS PARA REPROCESAMIENTO Y VARIOS/Cepillo Desechable/CEPILLO DE REPROCESAMIENTO1.4.JPG',
                ],
            ],
            [
                'category' => 'reprocesamiento',
                'name' => 'TAPON CANAL TRABAJO BIOPSIA ENDOSCOPIO (PAQUETE X 10 UNIDADES)',
                'description' => 'TAPON CANAL TRABAJO BIOPSIA ENDOSCOPIO (PAQUETE X 10 UNIDADES)',
                'images' => [],
            ],
            [
                'category' => 'videolaringoscopio',
                'name' => 'HOJA VIDEOLARINGOSCOPIO MAC 3 (ADULTO)',
                'description' => 'HOJA VIDEOLARINGOSCOPIO MAC 3 (ADULTO)',
                'images' => [
                    'products/detailed/INSUMOS PARA VIDEOLARINGOSCOPIO/hojas videolaringoscopio1.PNG',
                    'products/detailed/INSUMOS PARA VIDEOLARINGOSCOPIO/hojas videolaringoscopio2.PNG',
                    'products/detailed/INSUMOS PARA VIDEOLARINGOSCOPIO/hojas videolaringoscopio3.PNG',
                ],
            ],
            [
                'category' => 'videolaringoscopio',
                'name' => 'HOJA VIDEOLARINGOSCOPIO MAC 4 (PACIENTE OBESO)',
                'description' => 'HOJA VIDEOLARINGOSCOPIO MAC 4 (PACIENTE OBESO)',
                'images' => [
                    'products/detailed/INSUMOS PARA VIDEOLARINGOSCOPIO/hojas videolaringoscopio1.PNG',
                    'products/detailed/INSUMOS PARA VIDEOLARINGOSCOPIO/hojas videolaringoscopio2.PNG',
                    'products/detailed/INSUMOS PARA VIDEOLARINGOSCOPIO/hojas videolaringoscopio3.PNG',
                ],
            ],
            [
                'category' => 'videolaringoscopio',
                'name' => 'HOJA VIDEOLARINGOSCOPIO MAC 2 (NIÑO)',
                'description' => 'HOJA VIDEOLARINGOSCOPIO MAC 2 (NIÑO)',
                'images' => [
                    'products/detailed/INSUMOS PARA VIDEOLARINGOSCOPIO/hojas videolaringoscopio1.PNG',
                    'products/detailed/INSUMOS PARA VIDEOLARINGOSCOPIO/hojas videolaringoscopio2.PNG',
                    'products/detailed/INSUMOS PARA VIDEOLARINGOSCOPIO/hojas videolaringoscopio3.PNG',
                ],
            ],
            [
                'category' => 'videolaringoscopio',
                'name' => 'HOJA PARA VIDEO LARINGOSCOPIO CURVA REUTILIZABLE REF MAC 5',
                'description' => 'HOJA PARA VIDEO LARINGOSCOPIO CURVA REUTILIZABLE REF MAC 5',
                'images' => [
                    'products/detailed/INSUMOS PARA VIDEOLARINGOSCOPIO/hojas videolaringoscopio1.PNG',
                    'products/detailed/INSUMOS PARA VIDEOLARINGOSCOPIO/hojas videolaringoscopio2.PNG',
                    'products/detailed/INSUMOS PARA VIDEOLARINGOSCOPIO/hojas videolaringoscopio3.PNG',
                ],
            ],
            [
                'category' => 'stent-esofagico',
                'name' => 'STENT ESOFAGICO AUTOEXPANDIBLE PARCIALMENTE CUBIERTO EN AMBOS EXTREMOS',
                'description' => 'STENT ESOFAGICO AUTOEXPANDIBLE PARCIALMENTE CUBIERTO EN AMBOS EXTREMOS.',
                'images' => [
                    'products/detailed/STENT AUTOEXPANDIBLES ESOFAGICOS/EPB/EPB_1ncn.png',
                ],
            ],
            [
                'category' => 'stent-esofagico',
                'name' => 'STENT ESOFAGICO AUTOEXPANDIBLE PARCIALMENTE CUBIERTO',
                'description' => '(Descubierto en la cabeza proximal) VALVULA S DENTRO DEL STENT PARA ANTI-REFLUJO.',
                'images' => [
                    'products/detailed/STENT AUTOEXPANDIBLES ESOFAGICOS/EPC/EPC-1ccn.png',
                    'products/detailed/STENT AUTOEXPANDIBLES ESOFAGICOS/EPC/EPC-2.jpg',
                ],
            ],
            [
                'category' => 'stent-esofagico',
                'name' => 'STENT ESOFAGICO AUTOEXPANDIBLE COMPLETAMENTE CUBIERTO Y LAZOS EN AMBOS EXTREMOS',
                'description' => 'STENT ESOFAGICO AUTOEXPANDIBLE COMPLETAMENTE CUBIERTO Y LAZOS EN AMBOS EXTREMOS',
                'images' => [],
            ],
            [
                'category' => 'stent-esofagico',
                'name' => 'STENT ESOFAGICO AUTOEXPANDIBLE COMPLETAMENTE CUBIERTO',
                'description' => 'LAZOS EN AMBOS EXTREMOS/ VALVULA S DENTRO DEL STENT PARA ANTI-REFLUJO.',
                'images' => [
                    'products/detailed/STENT AUTOEXPANDIBLES ESOFAGICOS/HESV/HESV- ccc.jpg',
                ],
            ],
            [
                'category' => 'stent-biliar',
                'name' => 'STENT BILIAR AUTOEXPANDIBLE COMPLETAMENTE CUBIERTO DOBLE LAZO CON FLAP',
                'description' => 'STENT BILIAR AUTOEXPANDIBLE COMPLETAMENTE CUBIERTO DOBLE LAZO CON FLAP, LAZO EN LA PARTE PROXIMAL PARA LA EXTRACCIÓN DEL STENT Y LAZO LARGO PARA LA EXTRACCIÓN DEL STENT DE ADENTRO HACIA AFUERA.',
                'images' => [
                    'products/detailed/STENT AUTOEXPANDIBLE BILIAR/BCT/BCT flap lasso ccc.jpg',
                ],
            ],
            [
                'category' => 'stent-biliar',
                'name' => 'STENT BILIAR AUTOEXPANDIBLE COMPLETAMENTE CUBIERTO CON LAZOS',
                'description' => 'STENT BILIAR AUTOEXPANDIBLE COMPLETAMENTE CUBIERTO, LAZOS EN EL PROXIMAL PARA LA EXTRACCIÓN DEL STENT. MARCADORES RADIOPACOS.',
                'images' => [
                    'products/detailed/STENT AUTOEXPANDIBLE BILIAR/SHCL/SHCL-1lasso.png',
                    'products/detailed/STENT AUTOEXPANDIBLE BILIAR/SHCL/SHCL-2lasso.png',
                ],
            ],
            [
                'category' => 'stent-biliar',
                'name' => 'STENT BILIAR AUTOEXPANDIBLE NO RECUBIERTO',
                'description' => 'STENT BILIAR AUTOEXPANDIBLE NO RECUBIERTO. MARCADORES RADIOPACOS.',
                'images' => [
                    'products/detailed/STENT AUTOEXPANDIBLE BILIAR/SHS/SHS-1nnn.png',
                    'products/detailed/STENT AUTOEXPANDIBLE BILIAR/SHS/SHS-2nnn.png',
                ],
            ],
            [
                'category' => 'stent-duodenal',
                'name' => 'STENT DUODENAL/ PILORICO AUTOEXPANDIBLE NO RECUBIERTO DNZL',
                'description' => 'STENT DUODENAL/ PILORICO AUTOEXPANDIBLE NO RECUBIERTO, LAZO EN EL EXTREMO PROXIMAL, DOBLE MALLADO TTS.',
                'images' => [
                    'products/detailed/STENT AUTOEXPANDIBLE DUODENAL-PILORICO/DNZL/DNZL_2nnn.jpg',
                ],
            ],
            [
                'category' => 'stent-duodenal',
                'name' => 'STENT DUODENAL/ PILORICO AUTOEXPANDIBLE NO RECUBIERTO NDSL',
                'description' => 'STENT DUODENAL/ PILORICO AUTOEXPANDIBLE NO RECUBIERTO, LAZO EN EL EXTREMO PROXIMAL, DOBLE MALLADO TTS.',
                'images' => [
                    'products/detailed/STENT AUTOEXPANDIBLE DUODENAL-PILORICO/NDSL/NDSL- nnn.png',
                ],
            ],
            [
                'category' => 'stent-colon',
                'name' => 'STENT AUTOEXPANDIBLE NO RECUBIERTO DOBLE MALLADO TTS CNZ',
                'description' => 'STENT AUTOEXPANDIBLE NO RECUBIERTO DOBLE MALLADO TTS, LAZO EN LA PARTE PROXIMAL.',
                'images' => [
                    'products/detailed/STENT AUTOEXPANDIBLE COLON-RECTAL/CNZ/CNZ -lasso nn.jpg',
                ],
            ],
            [
                'category' => 'stent-colon',
                'name' => 'STENT AUTOEXPANDIBLE NO RECUBIERTO DOBLE MALLADO TTS NCSL',
                'description' => 'STENT AUTOEXPANDIBLE NO RECUBIERTO CUBIERTA TTS, LAZO EN LA PARTE PROXIMAL.',
                'images' => [
                    'products/detailed/STENT AUTOEXPANDIBLE COLON-RECTAL/NCSL/NCSL-lasso nn.jpg',
                ],
            ],
            [
                'category' => 'limpieza-desinfeccion',
                'name' => 'MADACIDE –1',
                'description' => 'Limpiador y desinfectante, a base de amonios cuaternarios de 3 y 4 generación. Para equipos y dispositivos médicos, todo tipo de superficies y áreas de procedimientos médicos. De uso hospitalario. MARCA: LP ADVANCED',
                'images' => [],
            ],
            [
                'category' => 'limpieza-desinfeccion',
                'name' => 'BKAC575 ACTIVEZONE - AMONIO CUATERNARIO DE 5ta GENERACIÓN DUAL',
                'description' => 'Limpiador y desinfectante dual de Dispositivos médicos, Equipos biomédicos y Mobiliario. MARCA: BIKAR',
                'images' => [],
            ],
            [
                'category' => 'limpieza-desinfeccion',
                'name' => 'BKAC5G ACTIVEZONE - AMONIO CUATERNARIO DE 5ta GENERACIÓN DUAL',
                'description' => 'DUAL, Limpiador y desinfectante dual de Dispositivos médicos, Equipos biomédicos y Mobiliario. MARCA: BIKAR',
                'images' => [],
            ],
            [
                'category' => 'limpieza-desinfeccion',
                'name' => 'BKAC20L ACTIVEZONE - AMONIO CUATERNARIO DE 5ta GENERACIÓN DUAL',
                'description' => 'Limpiador y desinfectante dual de Dispositivos médicos, Equipos biomédicos y Mobiliario. MARCA: BIKAR',
                'images' => [],
            ],
            [
                'category' => 'limpieza-desinfeccion',
                'name' => 'BKDEZG PENTAZYME KNK MEDICAL - DETERGENTE PENTAENZIMATICO',
                'description' => 'Pentaenzimático (Amilasa, Lipasa, Proteasa, Celulasa y Carbohidrasa) Para la limpieza por inmersión manual o de forma automatizada de dispositivos médicos compatibles y cualquier tipo de instrumental en el ámbito hospitalario, de laboratorio, odontológico y afines. (4mL/L) MARCA: BIKAR',
                'images' => [],
            ],
            [
                'category' => 'limpieza-desinfeccion',
                'name' => 'BKOXI02G OXITANE® BIKAR - ÁCIDO PERACÉTICO 0,2%',
                'description' => 'Desinfectante de alto nivel y esterilizante en frío, para equipos y dispositivos médicos. (Gastro) MARCA: BIKAR',
                'images' => [],
            ],
            [
                'category' => 'limpieza-desinfeccion',
                'name' => 'PPA04V50 BARTOVATION - TIRAS MEDIDORAS DE ÁCIDO PERACÉTICO',
                'description' => 'TIRAS MEDIDORAS DE ACIDO PERACETICO, NIVEL EXTRA ALTO 0-3000 ppm. MARCA: BIKAR',
                'images' => [],
            ],
        ];

        $order = 1;
        foreach ($products as $productData) {
            $category = $categories->get($productData['category']);

            if (!$category) {
                continue;
            }

            $product = Product::updateOrCreate(
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
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $imagePath,
                    'alt_text' => $productData['name'],
                    'order' => $imgOrder,
                ]);
            }
        }
    }
}
