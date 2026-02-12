<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Gardes à domicile',
                'description' => 'Que vous ayez un chat, un chien, un rongeur, un reptile ou tout autre animal de compagnie, vous pouvez compter sur nous.',
            ],
            [
                'title' => 'Promenades',
                'description' => 'Anihome vous propose un service de promenades de chiens adapté à vos besoins.',
            ],
            [
                'title' => 'Rongeurs et NAC',
                'description' => 'Vous avez un rongeur ou un nac et vous cherchez un service de garde à domicile ?',
            ],
            [
                'title' => 'Reptiles',
                'description' => 'Pierre possède et a déjà possédé des reptiles de toutes sortes.',
            ],
            [
                'title' => 'Gardiennage',
                'description' => 'Nous pouvons relever votre courrier, arroser vos plantes, ouvrir et fermer vos volets...',
            ],
            [
                'title' => "Service d'urgences",
                'description' => 'Vous devez vous absenter en urgence ? Pas de panique, Anihome est là.',
            ],
        ];

        foreach ($services as $service) {
            Service::create([
                'title' => $service['title'],
                'slug' => Str::slug($service['title']),
                'description' => $service['description'],
                'content' => $service['description'].' (Contenu complet à venir)',
                'is_active' => true,
            ]);
        }
    }
}
