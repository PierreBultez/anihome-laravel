<x-mail::message>
# Bonjour {{ $data['firstname'] }},

Merci de nous avoir contactés !

Nous avons bien reçu votre demande de devis concernant votre animal ({{ $data['animal'] ?? 'votre compagnon' }}). Nous allons l'étudier avec attention et nous reviendrons vers vous dans les plus brefs délais.

En attendant, vous pouvez continuer à découvrir nos services sur notre site.

<x-mail::button :url="config('app.url')">
Visiter Anihome
</x-mail::button>

À très bientôt,<br>
Wendy & Pierre d'{{ config('app.name') }}
</x-mail::message>
