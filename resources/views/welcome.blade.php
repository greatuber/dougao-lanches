<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dougão Lanches</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
 
        <style>
        .baner {
          text-align: center;
          font-family: 'Chela One', cursive;
          color: yellow;
          width: 100%;
          font-size: 35px;
        }
        </style>

        @vite('resources/css/app.css')

       
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center  sm:items-center min-h-screen bg-orange-500 ">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold  hover:text-gray-900  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold  dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
               <!-- Imagem e texto de apresentação -->
               <section class=" mt-0 items-center text-center">
                    <div class=" lg:w-full flex space-x-4 ">
                        <div class="baner pt-2 font-bold">
                            <h1 class="dog md:text-xl sm:text-4xl">DOUGÃO</h1>
                            <h2 class="lanch animate-pulse">LANCHES</h2>
                        </div>
                        {{-- <div class="items-center pr-4">
                            <img src="{{asset('image/hamburgueorange.png')}}" alt="Imagem de Lanches" class="border-none"> 
                        </div> --}}
                    </div>
                    <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4">
                        <div class="">
                                <h1 class="text-3xl text-white font-bold mb-2">Bem-vindo(a) ao Dougão Lanches</h1>
                                <div class="grid grid-cols-3">
                                    <p class="col-span-1 mb-4 text-white text-start">
                                        Aqui você encontra o melhor lanche da cidade, com ingredientes
                                        frescos e de qualidade. Venha matar sua fome com a gente, é só cadastra aqui no delivery do 
                                        Dougão,e fazer seu pedido por aqui mesmo sem demora e sem borocracia,forma de pagamentos,dinheiro,cartão e pix sendo efetuado 
                                        para entregador na hora da entrega.
                                    </p>
                                    <p class="col-span-2 mb-4 text-white text-start">
                                        Aqui você encontra o melhor lanche da cidade, com ingredientes
                                        frescos e de qualidade. Venha matar sua fome com a gente, é só cadastra aqui no delivery do 
                                        Dougão,e fazer seu pedido por aqui mesmo sem demora e sem borocracia,forma de pagamentos,dinheiro,cartão e pix sendo efetuado 
                                        para entregador na hora da entrega.
                                    </p>
                                    <div class="">
                                        <h1>aqui</h1>
                                    </div>  
                               

                                </div>
                        </div>
                    </div>
                
                    <!-- Rodapé -->
                <footer class="bg-orange-500 py-4">
                    <div class="container mx-auto  justify-between items-center px-4">
                            <p class="text-white">Todos os direitos reservados - Dougão Lanches</p>
                            <nav>
                                <ul class="flex">
                                    <li>
                                        <a href="#"  class="text-white hover:text-gray-200 px-4 py-2  rounded-md">Facebook</a>
                                    </li>
                                    <li>
                                        <a  href="#" class="text-white hover:text-gray-200 px-4 py-2 rounded-md">Instagram</a >
                                    </li>
                                    <li>
                                        <a  href="#" class="text-white hover:text-gray-200 px-4 py-2 rounded-md">WhatsApp</a>
                                    </li>
                                </ul>   
                            </nav>       
                    </div>
                </footer> 
            </section>
        </div>

    @vite('resources/js/app.js')
</body>
</html>
