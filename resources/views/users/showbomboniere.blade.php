

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/03e947ed86.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Chela+One&display=swap" rel="stylesheet">

             {{-- select --}}
        <link rel="stylesheet" href="../css/bootstrap-multselect.css" type="text/css"/>

    <style>
      .container {
        font-family: 'Chela One', cursive;
        font-family: 'Roboto', sans-serif;
      }
      .price {
         font-size: 20px;
        font-weight: bold;
      }
      .add {
        background-color: chartreuse;
        color: green;
      }
      .icon {
        font-size: 30px;
      color: red;
      margin-left: 15px;
      margin-top: 3px;
      }
      .success{

        padding: 4px;
        color: green;
        font-size: 18px;
        font-family: 'Courier New', Courier, monospace;
      }
      .cart{
        float:right;
        margin-top: 10px;
        padding-right: 10px;
      }
      .color{
        background-color: rgba(55, 122, 53, 0.726);
      }
     .button{
      margin-left: 120px;
     }
     .cartadd {
      box-shadow: 0 0 10px rgba(226, 231, 227, 0.5);
      transition: 0,5ms,ease-out;
     }
     .cartadd:hover {
      background-color:white;
      color: brown;
     }
     .wider {
      widows: 700px;
     }
     .img {
        width: 40px;
     }
     .green{
        color: green;
        /* background-color: cornsilk; */
        padding: 2px;
        border-radius: 6px;


     }
     .red {
        color: red;
        border-radius: 6px;
     }
     .greend {
        color: rgb(28, 108, 28);
     }

    </style>
    <title>CreateProduct</title>
</head>

<body>
    @vite('resources/css/app.css')

        <div class="baner  text-center bg-orange-500 pb-4">

          <div class="flex">

                  <div class="pt-2 ml-2 bg-orange-500 pb-2" @if ($toggle->is_open == 0 ?? '') inertex @endif>
                        @if ($toggle->is_open == 0 ?? '')
                        @php
                              // Verificar se o dia da semana é segunda-feira (considerando o formato padrão do Carbon)
                              $isMonday = \Carbon\Carbon::now()->dayOfWeek === 1;
                        @endphp

                        @if ($isMonday)
                              <p >A lanchonete está fechada. Abre terça-feira às 19:00hs.</p>
                        @else
                            <div class="bg-orange-300 red pl-2 pr-2 ">
                                <p>Lanchonete fechada</p>
                                <p>Abre hoje às 19:00 hs</p>
                            </div>
                        @endif
                        @else
                                <div class="lime pt-2 bg-orange-300 green pl-2 pr-2">
                                    Lanchonete aberta
                                </div>
                        @endif
                  </div>


                    <div class="bg-white text-black rounded p-2 mt-2 hidden">
                      <form action="{{ route('update.admin')}}" method="post">
                          @csrf
                          <button type="submit">
                              trocar para admin
                          </button>
                      </form>
                    </div>

                      <div class="logaut ">
                        <x-dropdown width="48">
                            <x-slot name="trigger">
                                <button class="  button inline-flex px-3 py-2 mt-2  text-sm leading-4 font-medium rounded-md text-yellow hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                {{-- <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link> --}}

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Sair') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                      </div>

          </div>

                    <div class="cart">
                          <div class="flex pl-4">
                            <a href="{{ route('cart.show')}}">
                              <i class="fa-solid fa-cart-flatbed-suitcase fa-beat text-yellow"></i>
                              <p class="text-yellow  ">
                                minhas compras
                              </p>
                          </a>
                            <div class="">
                                @if($productCount)

                                    {{$productCount}}

                                @endif
                                @if(!$productCount)
                                <i class="fa-solid fa-sad-tear  text-3xl text-white"></i>
                                @endif
                            </div>

                          </div>
                      <div class="text-2xl font-normal">


                         {{-- <div class="pb-2">
                            @if($order && $order->created_at->isToday())
                                <p class="text-yellow text-sm ">Status do seu pedido de numero: <span class="text-lg">{{$order->id ?? ''}}</span></p>
                                <p class="greend  pb-2">{{$order->status ?? ''}}</p>
                            @endif
                         </div> --}}

                      </div>
                    </div>

              <div class="">
                @include('layouts.baner')
              </div>
        </div>

        <div class=" orange bg-slate-50  w-full">
          <div class=" pr-4">
            @include('layouts.menu')
          </div>

          @if(session('access'))
          <div class="text-green-600">
              <p>
              {{ session('access')}}
              </p>
          </div>
      @endif

      @if(session('success'))
          <div class=" success text-center  bg-white ">
              <p>{{ session('success')}}</p>
          </div>
      @endif


            <div class="mb-5 mt-4 text-center" id="menu">
                <main class="grid grid-cols-1 md:grid-cols-2 gap-7 md:gap-10 lg:px-8 mx-auto max-w-7xl px-2 mb-15 ">
                   <!-- PRODUTO-ITEM  -->
                   @foreach ($productBombo as $item)
                   <div class=" flex gap-2">
                        @if($item->photo)
                          <div class="w-40 ">
                            <img src="{{ asset('storage/' .$item->photo) }}" alt="foto do lanche"
                            class="w-28 h-28 img-fluid rounded-md hover:scale-110 hover:-rotate-2 duration-300">
                          </div>
                        @endif
                        <div class="ml-4">
                            <p class="font-bold text-start">{{$item->name}}</p>
                            <p class="text-sm text-start">{{$item->description}}</p>

                            <div class="flex">
                                <p class="font-bold text-lg text-green">R$_ @money($item->price)</p>

                              <div class="ml-8">
                                  @if ($toggle->is_open ?? '' )

                                    <button class="btn btn-success ml-10 border cartadd " data-bs-toggle="modal"
                                        data-bs-target="#firstModal{{$item->id}}">

                                        <i class="fa-sharp fa-solid fa-cart-plus text-white"></i>


                                    </button>

                                  @else

                                    @include('layouts.button')

                                  @endif
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
                                                <Form action="{{ route('store.cart',$item->id)}}" method="post">
                                                    @csrf
                                                    <div class="text  pt-4 rounded">
                                                      <form class="grup-control">
                                                          <fieldset class="text-center">

                                                                <div class="label text-center">
                                                                    <img src="{{ asset('storage/' .$item->photo ?? '') }}" alt="foto do produto" class="img-fluid p-2 mx-auto d-block"><br>
                                                                    <strong><h1>PRODUTO</h1></strong>
                                                                    <input type="text" disabled class=" p-2  rounded "  name="product_id" id="product_id" value="{{ $item->name }}"/><br>
                                                                </div>
                                                                <div class=" mt-2 label2 text-center">
                                                                    <strong><h1>DESCRIÇÃO</h1></strong>
                                                                    <input type="text" disabled class=" p-2 rounded " id="description" value="{{ $item->description }}"/><br>
                                                                </div>
                                                                <div class=" mt-2 label2 text-center">
                                                                  <strong><h1>QUANTIDADE</h1></strong>
                                                                    <input type="number" min="1"  class=" p-2  rounded text-center " name="quanty" value="{{ $item->quanty }}"/><br>
                                                                </div>
                                                                <div class="label3 text-center p-2">
                                                                    <strong><h1>PREÇO UNITARIO</h1></strong>
                                                                    <input type="text"  disabled class=" rounded text-center " name="price" id="price" value="{{number_format($item->price,2,',','.')?? '' }}"/><br>
                                                                </div>
                                                                <div class="text-center p-2">
                                                                    <strong><label for="additional">ADICIONAIS</label></strong>
                                                                    </div>

                                                                <div class=" p-2 text-center">
                                                                  <strong><h1>OBSERVAÇÃO</h1></strong>
                                                                  <input type="text" autocomplete="off" class="  rounded " placeholder="Ex: sem tomate" name="observation" id="observation" value="{{$item->observation}}">
                                                                </div>
                                                                <div class="flex flex-col gap-2">
                                                                  <button class="btn btn-success text-with bg-success m-2" type="submit">ADICIONAR</button>
                                                                  <button type="button" class="btn btn-warning bg-warning m-2"data-bs-dismiss="modal">Cancelar</button>
                                                                </div>
                                                          </fieldset>
                                                      </form>
                                                    </div>
                                                </Form>
                                            </div>
                                            </div>
                                        </div>
                                </div>

                            </div>
                        </div>
                  </div>

                   @endforeach

                </main>

             </div>

              <div class="">
                  {{   $productBombo->links() }}
              </div>
        </div>
     @vite('resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>






