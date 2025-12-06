<?php

namespace Database\Seeders;

use App\Models\ClientTestimonial;
use Illuminate\Database\Seeder;

class ClientTestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Alisa Hester',
                'position' => 'Founder & CEO',
                'description' => 'Former co-founder of Opendoor. Early staff at Spotify and Clearbit.',
                'image' => 'testimonials/person1.jpg',
                'twitter_url' => null,
                'linkedin_url' => null,
                'dribbble_url' => null,
                'order' => 1,
                'is_active' => false,
            ],
            [
                'name' => 'Rich Wilson',
                'position' => 'Engineering Manager',
                'description' => 'Lead engineering teams at Figma, Pitch, and Protocol Labs.',
                'image' => 'testimonials/person2.jpg',
                'twitter_url' => null,
                'linkedin_url' => null,
                'dribbble_url' => null,
                'order' => 2,
                'is_active' => false,
            ],
            [
                'name' => 'Annie Stanley',
                'position' => 'Product Manager',
                'description' => 'Former PM for Airtable, Medium, Ghost, and Lumi.',
                'image' => 'testimonials/person3.jpg',
                'twitter_url' => null,
                'linkedin_url' => null,
                'dribbble_url' => null,
                'order' => 3,
                'is_active' => false,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            ClientTestimonial::updateOrCreate(
                ['name' => $testimonial['name']],
                $testimonial
            );
        }
    }
}
