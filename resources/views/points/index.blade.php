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
    <div class="container">
        <div class="user-info">
            <h1>{{Auth::user()->name}}</h1>
            @if($points[0]->points_earned ?? '' > 0)
                <p>
                    <p>Você tem {{ $points[0]->points_earned ?? ''}} pts</p>
                </p>
            @else
            Você ainda não posui pontos,mas continue porque a cada compra 
                    seu valor em diheiro vira pontos 
            @endif
        </div>

        <div class="mt-4">
            <p class="text-center">
                Aqui, o valor do seu pedido vira pontos e com eles você pode resgatar esses brindes:
            </p>
        </div>
          
        <div class="products-section">
            <div class="row mt-4">
                <!-- Brinde 1 -->
                <div class="col-md-6 pb-2">
                    <a href="{{ route('delivery.index') }}" class="btn btn-primary btn-block">
                        <h5 class="font-bold">Retirar na Lanchonete</h5>
                        <p>Click aqui para resgatar seu brinde retirando na lanchonete</p>
                    </a>
                </div>

                <div class="col-md-6">
                    <a href="{{ route('delivery.show') }}" class="btn btn-success btn-block">
                        <h5 class="font-bold">Resgatar com Pedido</h5>
                        <p>Click aqui para resgatar seu brinde junto com um pedido</p>
                    </a>
                </div>
         
            </div>    
    </div>
    @vite('resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>
