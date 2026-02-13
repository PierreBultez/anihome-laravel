<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- Inline style to set the HTML background color based on our theme in app.css --}}
        <style>
            html {
                background-color: hsl(0 0% 96%); /* Light Grey #F5F5F5 */
            }
        </style>

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- SEO Fallback -->
        <meta name="description" content="Anihome : Garde d'animaux à domicile à Courthézon et dans le Vaucluse. Pierre & Wendy, petsitters professionnels.">
        <meta property="og:title" content="Anihome : Petsitter à Courthézon (84) - Garde d'animaux">
        <meta property="og:description" content="Garde d'animaux de compagnie à domicile à Courthézon, Orange et environs.">
        <meta property="og:image" content="{{ asset('images/choisir_petsitter.webp') }}">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">

        <link rel="icon" href="/images/patte.png" type="image/png">
        <link rel="apple-touch-icon" href="/images/patte.png">

        @vite(['resources/js/app.ts', "resources/js/pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
