<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Léa Martino',
                'content' => "Je suis très satisfaite du service d'Anihome. J'ai confié mon chat et mon lapin à Wendy, qui a été très professionnelle et attentionnée. Elle m'a envoyé des photos et des nouvelles tous les jours, et elle a respecté les consignes que je lui avais données. Je recommande vivement Anihome.fr pour la garde d'animaux à domicile.",
                'photo_path' => 'testimonials/8qr0QUdKGVRJRZyMRk55ARHZG7FoIVftIYb0tjJj.jpg',
            ],
            [
                'name' => 'Hugo Dubois',
                'content' => "Anihome est un service de qualité, fiable et efficace. J'ai fait garder mon chien par Pierre, qui a été adorable avec lui. Il l'a promené, joué avec lui, et lui a donné beaucoup d'amour. Mon chien était heureux et en pleine forme quand je suis rentré. Je n'hésiterai pas à refaire appel à Anihome pour la garde de mon chien.",
                'photo_path' => 'testimonials/YGfvfQrF0oYuY9u6XcUZu7YaWrAnK2OnOCjbiqha.webp',
            ],
            [
                'name' => 'Camille Carnicelli',
                'content' => "Anihome.fr est un service que je conseille vivement. J'ai fait garder ma tortue et mon gecko par Pierre et Wendy, qui ont été très compétents et passionnés. Ils ont su s'en occuper avec soin. Ils m'ont également rassurée en m'envoyant des photos et des nouvelles régulièrement. Je remercie Anihome.fr pour la garde de mes reptiles.",
                'photo_path' => 'testimonials/exLZxYpoixIISmwwvmL7rl9d7XNdpxmCnC52OIq1.jpg',
            ],
            [
                'name' => 'Alexandre Ricci',
                'content' => "Je suis très satisfait du service de petsitter fourni par anihome.fr. Wendy et Pierre sont venus garder mon cochon d'Inde chez moi pendant quatre jours et ils ont été très efficaces. Ils ont respecté les consignes que je leur avais données. Ils m'ont envoyé des sms et des photos pour me donner des nouvelles. Je les remercie pour leur professionnalisme et leur douceur.",
                'photo_path' => null,
            ],
            [
                'name' => 'Clara Moretti',
                'content' => "Anihome.fr est un service de petsitter de confiance, que je recommande à tous ceux qui ont des animaux. Wendy et Pierre sont venus s'occuper de mon chat et de mon iguane chez moi pendant une semaine et ils ont été formidables. Ils m'ont tenu informé de leur état de santé et de leur humeur. Mon chat et mon iguane ont été très heureux. Je les remercie pour leur attention et leur passion.",
                'photo_path' => 'testimonials/jM8gSo9DeEmKaT4MMHSKKuBFZ4ZtmhB0HBukyGtR.jpg',
            ],
            [
                'name' => 'Julia Bianchi',
                'content' => "Je suis ravie du service de petsitter offert par anihome.fr. Pierre s'est occupé de mon pogona pendant dix jours et il a été formidable. Il m'a tenu au courant de son état de santé et de son moral. Mon pogona a été très heureux pendant mon absence. Je le remercie pour son attention et son affection.",
                'photo_path' => null,
            ],
            [
                'name' => 'Thomas Dessaint',
                'content' => "Anihome.fr est le meilleur service de petsitter que j'ai pu trouver dans le Vaucluse. Wendy et Pierre sont des personnes de confiance, qui s'occupent très bien de nos amis à poils, à plumes ou à écailles. Ils sont venus s'occuper de mes chats pendant une semaine et ils ont été aux petits soins. Ils m'ont envoyé des photos et des nouvelles régulièrement. Je les recommande vivement.",
                'photo_path' => null,
            ],
            [
                'name' => 'Laura Rossi',
                'content' => "Je suis très contente du service de petsitter proposé par anihome.fr. Wendy et Pierre ont gardé mon lapin pendant deux semaines et ils ont été adorables. Ils m'ont envoyé des photos et des vidéos tous les jours pour me rassurer. Mon lapin a eu droit à des câlins, des jeux et des friandises. Je les remercie infiniment pour leur dévouement et leur amour des animaux.",
                'photo_path' => null,
            ],
            [
                'name' => 'Lucas Esposito',
                'content' => "Anihome.fr est le meilleur choix que j'ai fait pour faire garder mes deux tortues pendant mon absence. Wendy et Pierre sont des amoureux des animaux, qui connaissent bien leurs besoins et leurs caractères. Mes tortues ont été chouchoutées et dorlotées. Je les remercie du fond du cœur pour leur service impeccable.",
                'photo_path' => null,
            ],
            [
                'name' => 'Matthieu Rinaldi',
                'content' => "J'ai fait confiance à anihome.fr pour faire garder mon chinchilla chez moi pendant mon déménagement et je n'ai pas été déçu. Wendy et Pierre sont des petsitters très compétents et attentionnés. Ils ont pris soin de mon chinchilla, ils ont nettoyé sa cage, ils lui ont donné de l'eau et de la nourriture fraîche. Ils m'ont envoyé des messages et des vidéos pour me rassurer. Je les remercie pour tout.",
                'photo_path' => null,
            ],
            [
                'name' => 'Emilie Stasziak',
                'content' => "Anihome.fr est un service de petsitter de qualité, que je conseille à tous les propriétaires d'animaux exotiques. Pierre est venu garder mon serpent et mon scorpion chez moi pendant dix jours et il a été super. Il a vérifié la température et l'humidité du terrarium, il a donné de la nourriture vivante et de l'eau à mes animaux. Il m'a envoyé des photos et des nouvelles et j'ai pu le joindre. Je le remercie énormément.",
                'photo_path' => null,
            ],
            [
                'name' => 'Julie Dupont',
                'content' => "J'ai confié mon chat à Wendy pendant mes vacances et je n'ai pas regretté mon choix. Ils sont très professionnels, attentionnés et passionnés par les animaux. Mon chat a été choyé, nourri et câliné. Je les remercie pour leur gentillesse et leur sérieux. Je n'hésiterai pas à refaire appel à eux.",
                'photo_path' => null,
            ],
            [
                'name' => 'Sophie Ferrari',
                'content' => "J'ai fait appel à anihome.fr pour la première fois et je n'ai pas été déçue. Wendy et Pierre sont des petsitters exceptionnels, qui savent s'adapter aux besoins de chaque animal. Ils ont pris soin de mon chat diabétique. Ils ont été très attentifs, rassurants et professionnels. Mon chat a été très bien traité et il a même fait des copains. Je suis très reconnaissante envers Wendy et Pierre pour leur gentillesse et leur savoir-faire.",
                'photo_path' => null,
            ],
            [
                'name' => 'David Russo',
                'content' => "Anihome.fr est une adresse à retenir pour tous ceux qui cherchent un petsitter de confiance dans le Vaucluse. Wendy et Pierre sont des personnes sérieuses, compétentes et passionnées. Ils se sont occupés de mon chien pendant une semaine comme si c'était le leur. Ils m'ont donné des nouvelles régulièrement et j'ai pu partir en vacances l'esprit tranquille. Je les recommande sans hésiter.",
                'photo_path' => null,
            ],
            [
                'name' => 'Maxime Romano',
                'content' => "Anihome.fr est un service de petsitter de qualité, que je conseille à tous les propriétaires d'animaux. Wendy et Pierre sont des personnes fiables et attentionnées. Ils ont gardé mon chien pendant trois jours et ils ont été aux petits soins. Je les remercie pour leur délicatesse et leur générosité.",
                'photo_path' => null,
            ],
            [
                'name' => 'Marie Lefèvre',
                'content' => "Nous avons fait appel à Anihome pour la garde de nos deux chats pendant nos vacances d'été. Wendy est passée deux fois par jour, a respecté les horaires de repas et m'a envoyé des photos chaque soir. Les chats étaient détendus à notre retour. Un grand merci !",
                'photo_path' => null,
            ],
            [
                'name' => 'Antoine Girard',
                'content' => "Pierre est venu promener mon golden retriever tous les jours pendant ma convalescence. Il a été ponctuel, patient et très à l'écoute de mes consignes. Mon chien l'adore et réclame ses balades avec lui. Un service irréprochable.",
                'photo_path' => null,
            ],
            [
                'name' => 'Nathalie Bonnet',
                'content' => "J'étais très inquiète de laisser ma chatte âgée de 17 ans seule à la maison. Wendy a su me rassurer dès le premier contact. Elle lui a administré ses médicaments sans problème et m'a envoyé des nouvelles rassurantes tous les jours. Je referai appel à Anihome les yeux fermés.",
                'photo_path' => null,
            ],
            [
                'name' => 'Romain Castellano',
                'content' => "Super expérience avec Anihome ! Pierre et Wendy se sont occupés de mon bouledogue français qui a des besoins spécifiques à cause de ses problèmes respiratoires. Ils ont été très attentifs à son état et m'ont prévenu immédiatement quand il a eu un petit souci. Professionnalisme au top.",
                'photo_path' => null,
            ],
            [
                'name' => 'Isabelle Mercier',
                'content' => "Troisième fois que je fais appel à Anihome pour la garde de mes perruches et de mon cochon d'Inde. Comme d'habitude, tout s'est parfaitement passé. Pierre connaît bien mes animaux maintenant et ils sont à l'aise avec lui. C'est rassurant de savoir qu'ils sont entre de bonnes mains.",
                'photo_path' => null,
            ],
            [
                'name' => 'Julien Pasquier',
                'content' => "Wendy a gardé notre labrador pendant le week-end de Pâques. Elle l'a emmené en promenade au bord de l'Ouvèze et lui a donné tout l'amour dont il avait besoin. À notre retour, notre chien était en pleine forme et visiblement heureux. Merci Anihome !",
                'photo_path' => null,
            ],
            [
                'name' => 'Pauline Vidal',
                'content' => "Je recommande Anihome à 100 %. J'ai un chat très craintif qui ne supporte pas les pensions. Pierre est venu chez moi et a pris le temps de l'apprivoiser doucement. Au bout de deux jours, mon chat venait se frotter à ses jambes. Les photos qu'il m'envoyait étaient adorables.",
                'photo_path' => null,
            ],
            [
                'name' => 'François Lambert',
                'content' => "En tant que vétérinaire, je suis exigeant sur la qualité des soins apportés aux animaux. J'ai confié mes deux chats à Wendy et Pierre et j'ai été bluffé par leur sérieux. Ils ont respecté scrupuleusement le protocole alimentaire et m'ont tenu informé quotidiennement. Bravo.",
                'photo_path' => null,
            ],
            [
                'name' => 'Céline Arnaud',
                'content' => "Mon hamster est entre de bonnes mains avec Anihome. Pierre est venu tous les jours vérifier sa cage, changer son eau et lui donner des friandises. Il m'a même signalé que la roue faisait un bruit bizarre. Attentif aux moindres détails, je suis impressionnée.",
                'photo_path' => null,
            ],
            [
                'name' => 'Vincent Martel',
                'content' => "Nous avons trois chiens de tailles différentes et ce n'est pas facile de trouver quelqu'un qui accepte de tous les garder. Wendy et Pierre ont relevé le défi sans problème. Promenades, repas, câlins : tout était parfait. On ne changera plus de petsitter !",
                'photo_path' => null,
            ],
            [
                'name' => 'Audrey Colonna',
                'content' => "Pierre s'est occupé de mon aquarium tropical pendant mes deux semaines de vacances. Il a vérifié la température, le pH, nourri les poissons et nettoyé le filtre. Tout était impeccable à mon retour. Je ne pensais pas qu'un petsitter pouvait aussi bien gérer un aquarium.",
                'photo_path' => null,
            ],
            [
                'name' => 'Nicolas Fabre',
                'content' => "Anihome a gardé notre vieux cocker de 14 ans qui prend trois médicaments différents. Wendy a tout géré comme une pro, avec les bons horaires et les bonnes doses. Notre chien était serein et bien soigné. Un immense merci pour votre patience et votre douceur.",
                'photo_path' => null,
            ],
            [
                'name' => 'Stéphanie Roche',
                'content' => "C'est la première fois que je laissais mon chaton seul et j'étais morte d'inquiétude. Wendy m'a envoyé des photos et des vidéos plusieurs fois par jour. Mon chaton jouait, mangeait bien et semblait parfaitement à l'aise. Quel soulagement ! Merci Anihome.",
                'photo_path' => null,
            ],
            [
                'name' => 'Damien Parisi',
                'content' => "Je fais appel à Anihome depuis plus d'un an pour les promenades quotidiennes de mon berger australien pendant mes journées de travail. Pierre est devenu le meilleur ami de mon chien. Ponctualité, fiabilité et bonne humeur sont toujours au rendez-vous.",
                'photo_path' => null,
            ],
            [
                'name' => 'Caroline Blanc',
                'content' => "Wendy et Pierre ont gardé mon maine coon et mes deux gerbilles pendant dix jours. Ils ont su s'adapter aux besoins très différents de chaque animal. Les photos quotidiennes étaient un vrai bonheur. Service professionnel et humain, je recommande chaleureusement.",
                'photo_path' => null,
            ],
            [
                'name' => 'Sébastien Morel',
                'content' => "J'avais peur de laisser mon husky seul trop longtemps car il a tendance à être anxieux. Pierre est passé trois fois par jour et l'a emmené courir au parc. Mon chien n'a montré aucun signe de stress. Anihome comprend vraiment les besoins de chaque animal.",
                'photo_path' => null,
            ],
            [
                'name' => 'Elodie Santini',
                'content' => "Service impeccable pour la garde de ma lapine pendant les fêtes de Noël. Wendy a nettoyé l'enclos, changé le foin et passé du temps à la caresser. Ma lapine était en pleine forme à mon retour. Merci pour cette tranquillité d'esprit.",
                'photo_path' => null,
            ],
            [
                'name' => 'Guillaume Fontaine',
                'content' => "J'ai confié mes deux furets à Pierre et Wendy pendant une semaine. Ils sont très énergiques et pas faciles à gérer, mais l'équipe d'Anihome a assuré. Photos de furets endormis après leurs sessions de jeu, ça m'a beaucoup fait rire. Merci pour tout !",
                'photo_path' => null,
            ],
            [
                'name' => 'Manon Chevalier',
                'content' => "Anihome s'est occupé de mon chat et de mes poissons rouges pendant mes vacances. Tout était nickel à mon retour. Le chat avait même l'air triste que Wendy ne revienne plus ! Un service fiable et chaleureux, exactement ce qu'il faut.",
                'photo_path' => null,
            ],
            [
                'name' => 'Christophe Renaud',
                'content' => "Pierre a promené mon dogue allemand tous les matins pendant un mois suite à ma fracture du pied. Il a été d'une ponctualité exemplaire et mon chien l'attendait avec impatience devant la porte. Un grand merci pour ce service qui m'a vraiment dépanné.",
                'photo_path' => null,
            ],
            [
                'name' => 'Amandine Leroy',
                'content' => "Nous avons fait garder notre chat FIV+ par Wendy. Elle a parfaitement compris ses besoins spécifiques et a veillé à ce qu'il ne manque de rien. Les comptes-rendus quotidiens étaient détaillés et rassurants. Un service adapté même pour les animaux fragiles.",
                'photo_path' => null,
            ],
            [
                'name' => 'Thibault Garnier',
                'content' => "Deuxième fois que je confie mes canaris à Pierre. Il connaît bien les oiseaux et sait comment les approcher sans les stresser. Il a changé l'eau, les graines et a même nettoyé la cage. Service au top, je recommande pour les propriétaires d'oiseaux.",
                'photo_path' => null,
            ],
            [
                'name' => 'Sandrine Picard',
                'content' => "Wendy a gardé notre vieille chatte de 19 ans qui a besoin de soins constants. Elle a été d'une douceur incroyable avec elle, lui a donné ses médicaments et l'a installée confortablement. Notre mamie chat était paisible et rassurée. Merci infiniment.",
                'photo_path' => null,
            ],
            [
                'name' => 'Olivier Dumas',
                'content' => "J'ai fait appel à Anihome pour mon border collie pendant un déplacement professionnel de cinq jours. Pierre l'a promené longuement et l'a stimulé avec des jeux d'intelligence. Mon chien était fatigué et heureux le soir, exactement ce qu'il lui fallait. Parfait.",
                'photo_path' => null,
            ],
            [
                'name' => 'Virginie Clement',
                'content' => "Anihome a pris soin de mes trois rats domestiques pendant deux semaines. Pierre a nettoyé la cage régulièrement, vérifié leur état de santé et leur a donné des friandises. Mes rats étaient en pleine forme à mon retour. Un service rare pour ce type d'animaux.",
                'photo_path' => null,
            ],
            [
                'name' => 'Michaël Costa',
                'content' => "Super service ! Wendy est venue garder notre jack russell très énergique pendant le week-end. Elle l'a épuisé avec de grandes balades et il était sage comme une image le soir. Les photos envoyées étaient géniales. On fera appel à Anihome à chaque absence.",
                'photo_path' => null,
            ],
            [
                'name' => 'Delphine Roux',
                'content' => "J'avais besoin d'un petsitter en urgence pour mon chat car j'ai dû partir pour un décès familial. Wendy a accepté immédiatement et s'est occupée de tout avec beaucoup de bienveillance. Dans un moment difficile, savoir mon chat entre de bonnes mains m'a enlevé un poids énorme.",
                'photo_path' => null,
            ],
            [
                'name' => 'Frédéric Mallet',
                'content' => "Pierre et Wendy ont gardé nos deux cavaliers king charles pendant nos vacances d'hiver. Ils les ont traités comme des rois : promenades, brossage, câlins. Les chiens ne voulaient plus nous faire la fête à notre retour, preuve qu'ils étaient très bien sans nous !",
                'photo_path' => null,
            ],
            [
                'name' => 'Laetitia Barbier',
                'content' => "Je fais garder mon perroquet gris du Gabon par Pierre depuis six mois à chaque déplacement. Il a appris à le connaître et mon perroquet lui parle maintenant. C'est rare de trouver quelqu'un à l'aise avec les oiseaux parleurs. Merci Anihome pour cette confiance.",
                'photo_path' => null,
            ],
            [
                'name' => 'Jérôme Duval',
                'content' => "Anihome a su prendre en charge mon chat après son opération alors que je devais m'absenter. Wendy lui a donné ses antibiotiques, vérifié sa cicatrice et l'a empêché de se gratter. Un vrai suivi post-opératoire à domicile. Je suis très reconnaissant.",
                'photo_path' => null,
            ],
            [
                'name' => 'Mélanie Fournier',
                'content' => "Nous avons confié notre teckel à poil dur à Pierre pour la première fois et nous sommes conquis. Il a pris le temps de venir faire connaissance avant la garde, ce qui a mis tout le monde en confiance. Notre chien l'a adopté immédiatement. Service professionnel et humain.",
                'photo_path' => null,
            ],
            [
                'name' => 'Philippe Gasquet',
                'content' => "J'ai deux axolotls et je ne pensais pas trouver un petsitter qui saurait s'en occuper. Pierre a vérifié la température de l'eau, le filtre et les a nourris correctement. Il m'a même envoyé des photos sous-marines amusantes. Bravo pour cette polyvalence.",
                'photo_path' => null,
            ],
            [
                'name' => 'Hélène Bertrand',
                'content' => "Quatrième garde avec Anihome et toujours aussi satisfaite. Wendy connaît ma chatte par cœur maintenant, ses habitudes, ses cachettes préférées et ses horaires de repas. C'est un vrai confort de ne plus avoir à tout réexpliquer. Fidèle cliente !",
                'photo_path' => null,
            ],
            [
                'name' => 'Yannick Delorme',
                'content' => "Pierre a gardé mon staffie qui est parfois méfiant avec les inconnus. Il a pris le temps de créer un lien de confiance et au bout de deux visites, mon chien le réclamait. Les promenades se sont très bien passées. Un vrai professionnel qui comprend les chiens.",
                'photo_path' => null,
            ],
            [
                'name' => 'Anne-Sophie Tanguy',
                'content' => "Service parfait pour la garde de mon cochon d'Inde et de mon hamster. Wendy a été minutieuse dans l'entretien des cages et la distribution de nourriture fraîche. Mes petits compagnons étaient en pleine santé à mon retour. Je recommande sans réserve.",
                'photo_path' => null,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create([
                'name' => $testimonial['name'],
                'content' => $testimonial['content'],
                'photo_path' => $testimonial['photo_path'],
                'is_active' => true,
            ]);
        }
    }
}
