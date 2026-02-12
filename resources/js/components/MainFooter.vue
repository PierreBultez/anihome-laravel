<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

const currentYear = new Date().getFullYear();
</script>

<template>
    <footer
        class="border-t border-footer-border bg-footer text-footer-foreground"
    >
        <div class="container mx-auto px-4 py-16 md:px-8">
            <div class="grid gap-12 md:grid-cols-2 lg:grid-cols-3">
                <!-- About -->
                <div>
                    <Link href="/" class="mb-6 flex items-center gap-2">
                        <img
                            src="/images/Logo_footer.png"
                            alt="Anihome"
                            class="h-16 w-auto"
                        />
                    </Link>
                    <p class="mb-4 text-sm leading-relaxed">
                        Anihome est votre service de garde d’animaux de
                        compagnie à domicile à Courthézon, près de Orange, dans
                        le Vaucluse.
                    </p>
                    <p class="mb-6 text-sm leading-relaxed">
                        Nous sommes Pierre et Wendy, passionnés et
                        professionnels des animaux, et nous prenons soin de
                        votre compagnon à quatre pattes avec amour et respect.
                    </p>
                    <div class="flex gap-4">
                        <a
                            href="https://www.facebook.com/anihomecourthezon"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="rounded-full bg-primary p-2 text-white transition-colors hover:bg-primary/80"
                        >
                            <span class="sr-only">Facebook</span>
                            <svg
                                fill="currentColor"
                                viewBox="0 0 24 24"
                                class="h-5 w-5"
                            >
                                <path
                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                ></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="mb-6 text-lg font-bold text-white">
                        INFORMATIONS DE CONTACT
                    </h3>
                    <ul class="space-y-4 text-sm">
                        <li class="flex items-center gap-2">
                            <span class="font-semibold text-primary"
                                >Wendy :</span
                            >
                            <a
                                href="tel:0641137520"
                                class="transition-colors hover:text-white"
                                >06.41.13.75.20</a
                            >
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="font-semibold text-primary"
                                >Pierre :</span
                            >
                            <a
                                href="tel:0641137518"
                                class="transition-colors hover:text-white"
                                >06.41.13.75.18</a
                            >
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="font-semibold text-primary"
                                >Email :</span
                            >
                            <a
                                href="mailto:contact@anihome.fr"
                                class="transition-colors hover:text-white"
                                >contact@anihome.fr</a
                            >
                        </li>
                    </ul>
                </div>

                <!-- Legal -->
                <div>
                    <h3 class="mb-6 text-lg font-bold text-white">
                        INFOS LEGALES
                    </h3>
                    <ul class="space-y-4 text-sm">
                        <li>
                            <Link
                                href="/politique-de-confidentialite"
                                class="transition-colors hover:text-white"
                                >Politique de confidentialité</Link
                            >
                        </li>
                        <li>
                            <Link
                                href="/mentions-legales"
                                class="transition-colors hover:text-white"
                                >Mentions légales</Link
                            >
                        </li>
                    </ul>
                </div>
            </div>

            <div
                class="mt-12 border-t border-footer-border pt-8 text-center text-xs text-gray-500"
            >
                <p>
                    &copy; Copyright {{ currentYear }} | Conception : Pierre
                    Bultez | Tous droits réservés | Powered by
                    <a
                        href="https://laravel.com"
                        class="transition-colors hover:text-white"
                        >Laravel</a
                    >
                    with ❤
                </p>
            </div>
        </div>
    </footer>
</template>
