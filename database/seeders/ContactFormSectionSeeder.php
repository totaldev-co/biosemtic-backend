<?php

namespace Database\Seeders;

use App\Models\ContactFormSection;
use Illuminate\Database\Seeder;

class ContactFormSectionSeeder extends Seeder
{
    public function run(): void
    {
        ContactFormSection::updateOrCreate(
            ['id' => 1],
            [
                'image' => 'contact/image-about.jpg',
                'is_active' => true,
            ]
        );
    }
}
