
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://kit.fontawesome.com/03e947ed86.js" crossorigin="anonymous"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <style>
              .baner {
          background-color: orangered;      
              
          text-align: center;
          font-family: 'Chela One', cursive;
          color: yellow;
          width: 100%;
        }
        .dog {
          font-size: 35px;  
        }
        .lanch {
          font-size: 28px;
        }
  
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">

      <div class="baner bg-red-500 pt-2 pb-4 ">
        <h1 class="dog md:text-xl">DOUGÃO</h1>
        <H2 class="lanch animate-pulse">LANCHES</H2>
      </div>
    </body>
    </html>     