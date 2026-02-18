<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('pass123'),
        ]);

        $this->call([
            SiteConfigSeeder::class,
            NavigationItemSeeder::class,
            FooterServiceLinkSeeder::class,
            SectionSettingSeeder::class,
            HeroSlideSeeder::class,
            AboutSectionSeeder::class,
            WhoWeAreSectionSeeder::class,
            ExcellenceCardSeeder::class,
            CompanyValueSeeder::class,
            MissionVisionSectionSeeder::class,
            ClientTestimonialSeeder::class,
            CallToActionSectionSeeder::class,
            ServiceSeeder::class,
            ServiceItemSeeder::class,
            ClientSeeder::class,
            NewsSeeder::class,
            BrandSeeder::class,
            ContactInfoSeeder::class,
            ProductCategorySeeder::class,
            ProductSeeder::class,
            ProductFaqSeeder::class,
            ContactFormSectionSeeder::class,
            ContactInfoCardSeeder::class,
        ]);
    }
}
