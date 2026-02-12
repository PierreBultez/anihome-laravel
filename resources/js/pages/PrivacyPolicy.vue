<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/layouts/MainLayout.vue';

defineOptions({ layout: MainLayout });
</script>

<template>
    <Head>
        <title>Politique de Confidentialité – Anihome</title>
        <meta name="robots" content="noindex, follow" />
    </Head>

    <div class="bg-background">
        <div class="bg-muted/30 py-12 text-center">
            <h1 class="text-4xl font-bold text-primary">Politique de Confidentialité</h1>
        </div>

        <div class="container mx-auto px-4 py-16">
            <div class="prose max-w-4xl mx-auto dark:prose-invert">
                <section class="mb-12">
                    <h2 class="text-2xl font-bold text-primary mb-4">1. Collecte de l'information</h2>
                    <p>
                        Nous recueillons des informations lorsque vous remplissez notre formulaire de contact sur le site <span class="font-bold text-primary">anihome.fr</span>. Les informations recueillies incluent votre nom et votre adresse e-mail.
                    </p>
                </section>

                <section class="mb-12">
                    <h2 class="text-2xl font-bold text-primary mb-4">2. Utilisation des informations</h2>
                    <p>Toutes les informations que nous recueillons auprès de vous peuvent être utilisées pour :</p>
                    <ul class="mt-4">
                        <li>Vous contacter par e-mail suite à votre demande.</li>
                        <li>Améliorer notre service client et vos besoins de prise en charge.</li>
                        <li>Améliorer notre site Web.</li>
                    </ul>
                </section>

                <section class="mb-12">
                    <h2 class="text-2xl font-bold text-primary mb-4">3. Confidentialité du commerce en ligne</h2>
                    <p>
                        Nous sommes les seuls propriétaires des informations recueillies sur ce site. Vos informations personnelles ne seront pas vendues, échangées, transférées, ou données à une autre société pour n'importe quelle raison, sans votre consentement.
                    </p>
                </section>

                <section class="mb-12">
                    <h2 class="text-2xl font-bold text-primary mb-4">4. Divulgation à des tiers</h2>
                    <p>
                        Nous ne vendons, n'échangeons et ne transférons pas vos informations personnelles identifiables à des tiers. Nous n'utilisons aucun service de suivi des activités ou d'analyse comportementale de type Google Analytics.
                    </p>
                    <p class="mt-4">
                        Cela ne comprend pas les tierce parties de confiance qui nous aident à exploiter notre site Web, tant que ces parties conviennent de garder ces informations confidentielles. Pour l'envoi de nos emails, nous utilisons le service <span class="font-bold text-primary">Brevo</span> (anciennement Sendinblue).
                    </p>
                    <ul class="mt-2 list-disc pl-6">
                        <li><strong>Prestataire</strong> : Brevo SAS</li>
                        <li><strong>Siège social</strong> : 106 boulevard Haussmann, 75008 Paris, France</li>
                        <li><strong>Conformité</strong> : Société française certifiée RGPD, garantissant que vos données sont stockées et traitées sur des serveurs situés au sein de l'Union Européenne.</li>
                    </ul>
                </section>

                <section class="mb-12">
                    <h2 class="text-22xl font-bold text-primary mb-4">5. Protection des informations</h2>
                    <p>
                        Nous mettons en œuvre une variété de mesures de sécurité pour préserver la sécurité de vos informations personnelles. Nous utilisons un cryptage à la pointe de la technologie (SSL) pour protéger les informations sensibles transmises en ligne.
                    </p>
                </section>

                <section class="mb-12">
                    <h2 class="text-2xl font-bold text-primary mb-4">6. Consentement</h2>
                    <p>
                        En utilisant notre site, vous consentez à notre politique de confidentialité.
                    </p>
                </section>
            </div>
        </div>
    </div>
</template>
