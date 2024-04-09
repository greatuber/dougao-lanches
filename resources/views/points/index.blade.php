<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/03e947ed86.js" crossorigin="anonymous"></script>
    <script src="{{asset('js/index-cart.js')}}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>centerCart</title>

    @vite('resources/css/app.css')
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            margin-top: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .user-info {
            text-align: center;
        }

        .user-info h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
            color: #007bff;
        }

        .user-info h2 {

            margin-bottom: 10px;
            color: #007bff;
        }

        .user-info p {
            font-size: 1.2em;
            color: #28a745;
        }

        .products-section {
            margin-top: 30px;
            text-align: center;
        }

        .product {
            display: inline-block;
            margin: 0 20px;
        }

        .product img {
            width: 150px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .product p {
            font-size: 1.2em;
            color: #6c757d;
        }
        .blind{
           background-color: #3aee64;
           width: 150px;
           padding: 2px;
        }
        .denied{
            color: red;
        }
    </style>
</head>

<body>
    @vite('resources/css/app.css')
    <div class="container ">

        <div class="pt-2 text-blue">
            <a href="{{ route('cart.show')}}"><i class="fa-solid fa-cart-flatbed-suitcase fa-beat text-yellow"></i>
                <p class="text-yellow text-2xl ">minhas compras</p></a>
        </div>
        <div class="user-info">
            <h2 class="font-bold">BEM VINDO AO SEU CARTÃO FIDELIDADE</h2>
            <h1>{{Auth::user()->name}}</h1>
            @if($points[0]->points_earned ?? '' > 0)
                <p>
                    Você tem {{ $points[0]->points_earned ?? ''}} pts
                </p>
            @else
              <strong class="text-start">
                Você ainda não possui pontos, mas não fique triste aqui o valor em dinheiro,
                de suas compras viram pontos,continue comprando.
              </strong>

            @endif
        </div>

        <div class="mt-4">
            <p class="text-center">

                Escolha forma que lhe for mais conviniente para resgatar seu Blinde
            </p>
        </div>

        <div class="products-section">
            <div class="row mt-4">
                <!-- Brinde 1 -->
                <div class="col-md-6 pb-2">
                    <div class="bg-orange-300 p-4 rounded">
                        <a href="{{ route('delivery.index') }}" class=" btn-block">
                            <h5 class="font-bold">Resgatar na Lanchonete</h5>
                            <p class="text-start">Click aqui para resgatar seu blinde retirando na lanchonete.</p>
                        </a>
                    </div>

                </div>

                <div class="col-md-6 mb-2">
                    <div class="bg-orange-300 p-4 rounded">
                        <a href="{{ route('delivery.show') }}" class=" btn-block">
                            <h5 class="font-bold">Resgatar com Pedido</h5>
                            <p class="text-start">Click aqui para resgatar seu blinde junto com um pedido.</p>
                        </a>
                    </div>

                </div>

                <div class="col-md-6 mb-2">
                    <div class="bg-orange-300 p-4 rounded">

                            <h3 class="font-bold">Regras para retirar o blinde na Lanchonete</h3>
                            <p class="text-start">Para resgatar seu blinde, retirando na Lanchonte você pode clicar no botão acima
                               e vai te levar para a pagina onde você pode escolher seus blindes de acordo com o número
                               de pontos que possue resgatando o blinde desejado a solicitação de retirada esta feita,
                               no estabelecimento o responsavel vai verificar a sua solicitação no sistema constando a veracidade do Pedido
                                em seguida autorizando a entrega do mesmo.
                            </p>

                    </div>
                </div>

                <div class="col-md-6 mb-2">
                    <div class="bg-orange-300 p-4 rounded">
                        <a href="{{ route('delivery.show') }}" class=" btn-block">
                            <h5 class="font-bold">Regras para  pedir o blinde junto com um pedido</h5>
                            <p class="text-start">Para resgatar seu blinde, junto com um pedido você pode clicar no botão acima
                               e vai te levar para a pagina onde você pode escolher seus blindes de acordo com o número
                               de pontos que possue resgatando o blinde desejado a solicitação de retirada esta feita,
                               e você pode verificar no seu carrinho de compras lembrando que vai ter que respeitar as regras de valor
                               minimo para entrega, e seu blinde vai chegar junto com seu pedido.
                            </p>
                        </a>
                    </div>
                </div>

            </div>
    </div>
    @vite('resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>
