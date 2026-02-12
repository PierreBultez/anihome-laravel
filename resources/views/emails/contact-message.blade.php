<x-mail::message>
# Nouveau message de contact

Vous avez reçu une nouvelle demande de devis via le site Anihome.

**Prénom :** {{ $data['firstname'] }}  
**Nom :** {{ $data['name'] }}  
**Email :** [{{ $data['email'] }}](mailto:{{ $data['email'] }})  
**Animal :** {{ $data['animal'] ?? 'Non spécifié' }}

**Message :**  
{{ $data['message'] }}

<x-mail::button :url="config('app.url')">
Retour sur le site
</x-mail::button>

Merci,<br>
L'équipe {{ config('app.name') }}
</x-mail::message>
