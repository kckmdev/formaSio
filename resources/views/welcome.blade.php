@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
</head>

<body class="bg-gray-100">
    <nav class="flex items-center justify-between flex-wrap bg-gray-800 p-3 text-white">
        <ul class="flex">
            <li class="mr-6"><a href="/">Forma</a></li>
        </ul>

        <div class="flex justify-end">
            <ul class="flex">
                <li class="mr-6"><a href="/contact">Formations</a></li>
                <li class="mr-6"><a href="/login">Connexion</a></li>
            </ul>
        </div>
    </nav>

    <!-- Presentation -->
    <div class="flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">

            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Forma
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Bienvenue sur Forma, le site de gestion des formations  pour les salariés et bénévoles des associations affiliées à la maison régionale des sports
de Lorraine..
                </p>
            </div>

            <div class="mt-8 space-y-6">
                <div class="rounded-md shadow-sm -space-y-px">
                    <a href="/login" class="w-full flex items-center justify-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-gray-800 hover:bg-gray-700 md:py-2 md:text-lg md:px-10">
                        Connexion
                    </a>
                </div>
            </div>
        </div>

</body>

</html>