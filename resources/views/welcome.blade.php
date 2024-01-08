@extends('layouts.app')

@section('title', 'Forma')

@section('content')
    <!-- Presentation -->
    @guest
        <div class="flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-md w-full space-y-8">

                <div>
                    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                        Forma
                    </h2>
                    <p class="mt-2 text-center text-sm text-gray-600">
                        Bienvenue sur Forma, le site de gestion des formations pour les salariés et bénévoles des
                        associations affiliées à la maison régionale des sports
                        de Lorraine..
                    </p>
                </div>

                <div class="mt-8 space-y-6">
                    <div class="rounded-md shadow-sm -space-y-px">
                        <a href="/login"
                            class="w-full flex items-center justify-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-gray-800 hover:bg-gray-700 md:py-2 md:text-lg md:px-10">
                            Connexion
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endguest
    <!-- cards 3 max sur une ligne-->
    <div class="flex flex-wrap justify-center mt-10">
        <div class="max-w-sm rounded overflow-hidden shadow-lg m-2 flex flex-col justify-between">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Gestion et Leadership</div>
                <p class="text-gray-700 text-base">
                    Développez vos compétences en gestion et leadership avec nos formations spécialisées. Apprenez à
                    conduire des réunions efficacement, à communiquer avec la presse, et à gérer les responsabilités des
                    dirigeants dans le sport.
                </p>
            </div>
            <div class="px-6 pt-4 pb-2">
                <span
                    class="inline-block m-1 bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#Leadership</span>
                <span
                    class="inline-block m-1 bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#Management</span>
                <span
                    class="inline-block m-1 bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">#BusinessManagement</span>
            </div>
        </div>
        <div class="max-w-sm rounded overflow-hidden shadow-lg m-2 flex flex-col justify-between">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Informatique et Design</div>
                <p class="text-gray-700 text-base">
                    Maîtrisez les outils informatiques et de design les plus demandés. Que vous soyez débutant ou
                    avancé, nos formations en Outlook, PowerPoint et Photoshop vous aideront à exceller.
                </p>
            </div>
            <div class="px-6 pt-4 pb-2">
                <span
                    class="inline-block m-1 bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#Informatique</span>
                <span
                    class="inline-block m-1 bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#DesignGraphique</span>
                <span
                    class="inline-block m-1 bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">#TechnologyEducation</span>
            </div>
        </div>
        <div class="max-w-sm rounded overflow-hidden shadow-lg m-2 flex flex-col justify-between">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Santé et Sécurité</div>
                <p class="text-gray-700 text-base">
                    Acquérez des compétences vitales en matière de santé et de sécurité avec nos cours de premiers
                    secours et de bonnes pratiques en sécurité. Devenez un acteur clé dans la prévention et la gestion
                    des urgences.
                </p>
            </div>
            <div class="px-6 pt-4 pb-2">
                <span
                    class="inline-block m-1 bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#Santé</span>
                <span
                    class="inline-block m-1 bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#Securité</span>
                <span
                    class="inline-block m-1 bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">#secours
                </span>
            </div>
        </div>

        <!-- partie info supp-->
        <div class="max-w-3xl mx-auto p-8">

            <h1 class="text-3xl font-bold text-center mb-6">
                Informations supplémentaires :
            </h1>

            <p class="text-gray-700 leading-relaxed text-center">
                Notre catalogue de formations s'étend bien au-delà des domaines de la gestion, de l'informatique, du
                développement durable, du secourisme et de la communication. Nous offrons également des sessions
                spécialisées sur des sujets comme la législation sportive, l'éthique, la comptabilité associative, et
                l'usage de logiciels spécifiques pour la gestion des clubs et des compétitions sportives. Ces formations
                sont conçues pour répondre aux besoins des salariés et bénévoles des associations affiliées à la maison
                régionale des sports de Lorraine. Explorez notre catalogue complet pour découvrir toutes les
                opportunités d'apprentissage que nous proposons et choisissez celles qui correspondent le mieux à vos
                intérêts et à vos besoins professionnels.
            </p>

        </div>


    </div>

@endsection
