<?php

namespace Database\Seeders;

use App\Models\ContactInfo;
use Illuminate\Database\Seeder;

class ContactInfoSeeder extends Seeder
{
    public function run(): void
    {
        ContactInfo::updateOrCreate(
            ['id' => 1],
            [
                'email' => 'ventas@biosimtec.com.co',
                'phone' => '+57 318 5277390',
                'address' => 'Cra. 80c #25f-34',
                'schedule' => "Lunes - Jueves: 7:00am - 5:00pm\nViernes: 7:00am - 4:00pm",
                'is_active' => true,
            ]
        );
    }
}
