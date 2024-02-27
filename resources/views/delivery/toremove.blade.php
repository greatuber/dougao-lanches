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
        .space {
            justify-content: space-between;
        }
        .cart{
            font-size: 1em;
            margin-bottom: 10px;
            color: #007bff;
            float: right;
        }
    </style>
</head>

<body>
    @vite('resources/css/app.css')
    <div class="container">
        <div class="space">
            <div class="cart">
                <a href="{{ route('cart.show')}}"><i class="fa-solid fa-cart-flatbed-suitcase fa-beat text-yellow"></i>
                    <p class="text-yellow text-2xl ">minhas compras</p></a>
            </div>
            
            <div class="user-info">
                <h1>{{Auth::user()->name}}</h1>
                @if($points[0]->points_earned ?? '' > 0)
                    <p>
                        <p>Você tem {{ $points[0]->points_earned ?? ''}} pts</p>
                    </p>
                @else
                        <h3 class="text-center"> Você ainda não posui pontos,mas continue porque a cada compra 
                            seu valor em diheiro vira pontos 
                        </h3>
                @endif
            </div>
        

        </div>
  

        <div class="mt-4">
            <p class="text-center">
                Aqui, o valor do seu pedido vira pontos e com eles você pode resgatar esses brindes:
            </p>
        </div>
          
            @if (session('delivery'))
               <div class="text-red text-center p-4">
                    <p>
                        {{session('delivery')}}
                    </p>
               </div>
            @endif

            @if ( session('remuve'))
              
                <div class="">
                    <p class="text-green-600">
                        {{ session('remuve')}}
                    </p>
                </div>

            @endif

            @if (session('brind'))
                <div class="blind rounded text-white p-2">
                    <p>{{session('brind')}}</p>
                </div>
                
            @endif

            @if ( session('denied'))
                <div class="denied text-center p-4">
                    <p>
                        {{ session('denied')}}
                    </p>
                </div>
            @endif
    
         
        <div class="products-section">
            <div class="row mt-4">
                <!-- Brinde 1 -->
             @foreach ($point as $item)

            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('storage/'.$item->image) }}" class="product img" alt="Imagem do Doce">
                    <div class="card-body">
                        <p class="card-text">{{$item->name }}</p>
                        <p class="card-text">Resgate por {{$item->points}}  pontos</p>
                        <button class="text-sm bg-blue-500 p-2 rounded border "  data-bs-toggle="modal"
                        data-bs-target="#firstModal{{$item->id}}">RESGATAR</button>
                    </div>
                </div>
                <div class="modal fade" id="firstModal{{$item->id}}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header,btn btn-warning">
                                {{-- <h2 class="modal-title pt-4 ml-40" id="exampleModalLabel text-center">Adiciona este produto em seu carrinho</h2> --}}
                                <button type="button" class="btn-close " data-bs-dismiss="modal"   aria-label="Close">
                                  X
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="p-4 relative">
                                    <form action="{{ route('blindcart.store',$item->id )}}" method="POST">
                                        @csrf
                                        <div class="pb-4 w-full text-start">
                                            
                                        </div>
                                        <div class="card">
                                            <img src="{{ asset('storage/' .$item->image) }}" class="product img" alt="Imagem do Doce">
                                            <div class="card-body">
                                                <p class="card-text">{{$item->name }}</p>
                                                <input type="hidden" name="name" value="{{$item->name}}">
                                                <p class="card-text">Resgate por {{$item->points}}  pontos</p>
                                                <input type="hidden" name="points" value="{{$item->points}}">
                                               
                                            </div>
                                                <div class="">
                                                    <button class='text-sm bg-blue-500 p-2 rounded border' type="submit">RESGATAR</button>
                                                </div>
                                        </div>

                                      
                                    </form>
                                  
                              </div>
                             
                            </div>
                            </div>
                        </div>
                </div>
            </div>

             @endforeach   
      
        </div>
    </div>
    @vite('resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>
