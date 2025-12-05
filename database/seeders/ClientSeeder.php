<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        $clients = [
            ['name' => 'Colmédica', 'logo' => 'clients/colmedica.png', 'order' => 1],
            ['name' => 'Keralty', 'logo' => 'clients/logo-keralty (1).svg', 'order' => 2],
            ['name' => 'San Vicente', 'logo' => 'clients/logo-san-vicente.png', 'order' => 3],
        ];

        foreach ($clients as $client) {
            Client::updateOrCreate(
                ['name' => $client['name']],
                [
                    'name' => $client['name'],
                    'logo' => $client['logo'],
                    'order' => $client['order'],
                    'is_active' => true,
                ]
            );
        }
    }
}
