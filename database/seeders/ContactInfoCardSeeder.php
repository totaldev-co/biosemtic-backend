<?php

namespace Database\Seeders;

use App\Models\ContactInfoCard;
use Illuminate\Database\Seeder;

class ContactInfoCardSeeder extends Seeder
{
    public function run(): void
    {
        $cards = [
            [
                'icon' => 'contact/info/email.png',
                'title' => 'Información de contacto',
                'text' => ['+57 318 5277390'],
                'detail' => 'ventas@biosimtec.com.co',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'icon' => 'contact/info/schedule.png',
                'title' => 'Oficinas y horarios',
                'text' => [
                    'Lunes - Jueves: 7:00am - 5:00pm',
                    'Viernes: 7:00am - 4:00pm',
                ],
                'detail' => 'Cra. 80c #25f-34',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'icon' => 'contact/info/phone.png',
                'title' => 'Canales rápidos',
                'text' => [
                    'Lunes - Jueves: 7:00am - 5:00pm',
                    'Viernes: 7:00am - 4:00pm',
                ],
                'detail' => null,
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($cards as $card) {
            ContactInfoCard::updateOrCreate(
                ['title' => $card['title']],
                $card
            );
        }
    }
}
