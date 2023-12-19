<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>@yield('title')</title>
</head>


<body>
    <div class="flex flex-col min-h-screen">
        @include('partials.navbar')

        @yield('content')
    </div>
</body>
