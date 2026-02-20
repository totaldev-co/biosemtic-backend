<?php

namespace Database\Seeders;

use App\Models\ServicePlan;
use Illuminate\Database\Seeder;

class ServicePlanSeeder extends Seeder
{
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Plan Plus',
                'icon' => 'service-items/preventive/cards-icons/star.svg',
                'features' => [
                    'Dos visitas anuales, una cada seis meses',
                    'Atención de L - V presencial y vía telefónica.',
                    'Soporte técnico en campo en un periodo máx de 8 horas (Aplica para clientes en Bogotá).',
                    'Soporte vía zoom en un periodo maximo de 8 horas.',
                    'Se mantienen los precios de repuestos durante todo el año.',
                    'Reparaciones menores en un periodo de 3 días hábiles.',
                    'Reparaciones intermedias en un periodo de 6 días hábiles.',
                    'Reparaciones mayores en un periodo de 10 días hábiles (sujeto a disponibilidad de repuestos).',
                    'Acceso a una capacitación dentro de cualquiera de las visitas programadas.',
                    'Mano de obra con descuento del 50%.',
                    'Acompañamiento y asesoría en cuidados y manipulación de equipos electrónicos.',
                ],
                'is_popular' => true,
                'popular_arrow_icon' => 'service-items/preventive/cards-icons/Vector.svg',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Plan Premium',
                'icon' => 'service-items/preventive/cards-icons/rocket.svg',
                'features' => [
                    'Tres visitas anuales, una cada cuatro meses.',
                    'Atención de L - V presencial y vía telefónica.',
                    'Soporte técnico en campo en un periodo máx de 8 horas (Aplica para clientes en Bogotá).',
                    'Soporte vía zoom en un periodo maximo de 8 horas.',
                    'Se mantienen los precios de repuestos durante todo el año.',
                    'Equipos de backup para reparaciones intermedias y mayores.',
                    'Reparaciones menores en un periodo de 3 días hábiles.',
                    'Reparaciones intermedias en un periodo de 6 días hábiles.',
                    'Reparaciones mayores en un periodo de 10 días hábiles (sujeto a disponibilidad de repuestos).',
                    'Acceso a una capacitación dentro de cualquiera de las visitas programadas.',
                    'Mano de obra con descuento del 70%.',
                    'Acompañamiento y asesoría en cuidados y manipulación de equipos electrónicos, endoscópicos y actividad de reprocesamiento. (dentro de las visitas programadas)',
                ],
                'is_popular' => false,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Plan Pro',
                'icon' => 'service-items/preventive/cards-icons/diamond.svg',
                'features' => [
                    'Tres visitas anuales, una cada cuatro meses.',
                    'Atención de L - V presencial y vía telefónica.',
                    'Soporte técnico 24/7 en campo en un periodo máx de 4 horas (Aplica para clientes en Bogotá).',
                    'Soporte vía zoom 24/7 en un periodo máx de 2 horas.',
                    'Se mantienen los precios de repuestos durante 2 años',
                    'Equipos de backup para reparaciones intermedias y mayores.',
                    'Reparaciones menores en un periodo de 2 días hábiles.',
                    'Reparaciones intermedias en un periodo de 3 días hábiles.',
                    'Reparaciones mayores en un periodo de 6 días hábiles (sujeto a disponibilidad de repuestos).',
                    'Acceso a capacitaciones ilimitadas de equipos en contrato.',
                    'Mano de obra con descuento del 100%.',
                    'Asesoría para procesos de habilitación y organización documental.',
                    'Acompañamiento y asesoría en cuidados y manipulación de equipos electrónicos, endoscópicos y actividad de reprocesamiento. (dentro de las visitas programadas)',
                    'Recibe obsequio por separación inmediata (1 pinza y 1 cepillo).',
                ],
                'is_popular' => false,
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($plans as $plan) {
            ServicePlan::updateOrCreate(
                ['name' => $plan['name']],
                $plan
            );
        }
    }
}
