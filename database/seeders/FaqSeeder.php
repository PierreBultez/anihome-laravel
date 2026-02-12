<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => "Petsitter c'est quoi ?",
                'answer' => "Le pet-sitting est une activité qui consiste à garder des animaux de compagnie chez soi ou chez leurs propriétaires en leur absence. C'est une solution pratique et économique pour les personnes qui voyagent ou qui ont des empêchements et qui ne veulent pas laisser leur animal seul ou en pension.",
            ],
            [
                'question' => 'Comment réserver vos services ?',
                'answer' => "Pour réserver nos services, vous pouvez nous contacter par téléphone, par email ou via le formulaire de contact de ce site. Nous conviendrons ensemble d'un rendez-vous pour faire connaissance avec vous et votre animal, et établir un devis personnalisé.",
            ],
            [
                'question' => 'Avez-vous un diplôme ?',
                'answer' => "Oui, nous sommes titulaires de l'ACACED (Attestation de Connaissances pour les Animaux de Compagnie d'Espèces Domestiques), qui est obligatoire pour exercer une activité liée aux animaux de compagnie. Nous avons également suivi une formation aux premiers secours canin et félin.",
            ],
            [
                'question' => 'Gardez-vous tous les animaux ?',
                'answer' => "Nous gardons principalement les chiens, les chats, les rongeurs, les oiseaux et les poissons. Nous pouvons également garder certains NAC (Nouveaux Animaux de Compagnie) sur demande. N'hésitez pas à nous contacter pour savoir si nous pouvons prendre en charge votre animal.",
            ],
            [
                'question' => 'Sur quel secteur intervenez vous ?',
                'answer' => "Nous intervenons principalement sur la commune de Courthézon et ses alentours (Jonquières, Châteauneuf-du-Pape, Bédarrides, Orange, Sorgues, Sarrians...). Des frais kilométriques peuvent s'appliquer selon la distance.",
            ],
            [
                'question' => 'Quels sont vos tarifs ?',
                'answer' => "Nos tarifs varient selon le type de prestation (visite, promenade, garde à domicile...), le type d'animal, la durée et la fréquence. Vous pouvez consulter notre page Tarifs pour avoir une idée de nos prix de base, ou nous contacter pour un devis précis.",
            ],
            [
                'question' => 'Mon animal prend des médicaments',
                'answer' => "Si votre animal a besoin d'un traitement médical, nous pouvons lui administrer ses médicaments sur ordonnance vétérinaire (comprimés, gouttes, injection d'insuline...). Nous avons l'habitude de gérer ce type de soins.",
            ],
            [
                'question' => 'Puis-je déposer mon animal chez vous ?',
                'answer' => 'Non, nous ne faisons pas de pension. Nous nous déplaçons uniquement à votre domicile pour garder vos animaux. Cela leur permet de rester dans leur environnement familier et de réduire leur stress.',
            ],
        ];

        foreach ($faqs as $index => $faq) {
            Faq::create([
                'question' => $faq['question'],
                'answer' => $faq['answer'],
                'is_active' => true,
                'order' => $index,
            ]);
        }
    }
}
