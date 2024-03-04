<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dougão Lanches</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link  rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <script src="https://kit.fontawesome.com/03e947ed86.js" crossorigin="anonymous"></script>
        <style>
        .baner {
          text-align: center;
          font-family: 'Chela One', cursive;
          color: yellow;
          width: 100%;
          font-size: 35px;
        }
        .icons{
            width: 300px;
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
                        <a href="{{ route('login') }}" class="font-semibold  hover:text-gray-900  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Entrar</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold  dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Registrar-se</a>
                        @endif
                    @endauth
                </div>
            @endif
               <!-- Imagem e texto de apresentação -->
               <section class=" mt-0 items-center text-center">
                    <div class=" lg:w-full flex  space-x-4 ">
                        <div class="baner pt-2 font-bold">
                            <div class="animate__animated animate__bounce">
                                <h1 class="dog md:text-xl sm:text-4xl">DOUGÃO</h1>
                                <h2 class="lanch animate-pulse">LANCHES</h2>
                            </div>
                        </div>
                        {{-- <div class="items-center pr-4">
                            <img src="{{asset('image/hamburgueorange.png')}}" alt="Imagem de Lanches" class="border-none"> 
                        </div> --}}
                    </div>
                    <div class="container mx-auto  md:flex-row items-center  px-4">
                        <div class="text-end">
                                <h1 class="text-3xl text-white text-center font-bold mb-2 p-4">Bem-vindo(a) ao Dougão Lanches</h1>
                                <div class="container ml-4 mr-4">
                                    <p class=" mb-4 text-white  text-left">
                                        Aqui você encontra o melhor lanche da cidade, com ingredientes
                                        frescos e de qualidade. Venha matar sua fome com a gente, é só cadastra aqui no delivery do 
                                        Dougão,e fazer seu pedido por aqui mesmo sem demora e sem borocracia,forma de pagamentos,dinheiro,cartão sendo efetuado 
                                        para entregador na hora da entrega, 
                                        aberto de terça a domingo apartir das 19:00 hr e fechamento as 12:00 hr,
                                        você também pode nos fazer uma visita pessoalmente e conhecer nosso estabelecimento
                                        situado na Rua Batista Luzardo numéro 1005 São Lourenço MG,será um praser recebelo em nosso
                                        estabecimento e nâo se esqueça de nos seguir no faceboock, para ficar pordentro das novidades.
                                    </p>
                                </div>
                        </div>
                   
                
                    <!-- Rodapé -->
                            <footer class="bg-orange-500 py-4">
                                <div class="container mx-auto  justify-between items-center ">
                                      
                                        <nav class="text-center">
                                            <ul class="flex">
                                                <li>
                                                    <a href="https://www.facebook.com/douglasodin199/?locale=pt_BR target_blanck"  class="text-white hover:text-gray-200 px-4 py-2 "><i class="fa-brands fa-square-facebook fa-2xl"></i></a>
                                                </li>

                                                <li>
                                                    <a  href="#" class="text-white hover:text-gray-200 px-4 py-2 icons"><i class="fa-brands fa-instagram fa-2xl"></i></a >
                                                </li>

                                                <li>
                                                    <a  href="https://api.whatsapp.com/send?phone=553599810371  target_blanck" class="text-white hover:text-gray-200 px-4 py-2 icons"><i class="fa-brands fa-whatsapp fa-2xl"></i></a>
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
