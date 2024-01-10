

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
            border: 2px solid green;
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
         

        </style>
        <title>CreateProduct</title>
    </head>
    
    <body>
        @vite('resources/css/app.css')
        
          <div class="baner  text-center">
               
            <div class="flex ml-4">
                <div class="pt-2" @if ($toggle->is_open == 0) inertex @endif>
                    @if ($toggle->is_open == 0 )
                        @php
                            // Verificar se o dia da semana é segunda-feira (considerando o formato padrão do Carbon)
                            $isMonday = \Carbon\Carbon::now()->dayOfWeek === 1;
                        @endphp
            
                        @if ($isMonday)
                            <p>A lanchonete está fechada. Abre terça-feira às 18:00hs.</p>
                        @else
                            <p>Lanchonete fechada</p>
                            <p>Abre hoje às 19:00 hs</p>
                        @endif
                          @else
                              <div class="lime pt-2">
                                  Lanchonete aberta
                              </div>
                          @endif
                </div>
                
            
                <div class="p-2">
                  @include('layouts.closed-button')
                </div> 
                      <div class="bg-white text-black rounded p-2 hidden">
                        <form action="{{ route('update.admin')}}" method="post">
                          @csrf
                          <button type="submit">
                            trocar para admin
                        </button>
                        </form>
                      </div>
                        @if(session('access'))
                          <div class="text-green-600">
                              <p>
                                {{ session('access')}}
                              </p>
                          </div>
                        @endif
            </div>
            
              <div class="cart">
                    <a href="{{ route('cart.show')}}"><i class="fa-solid fa-cart-flatbed-suitcase fa-beat text-yellow"></i>
                    <p class="text-yellow text-2xl ">minhas compras</p></a>
                <div class="">
               
                      <p class="text-yellow text-sm ">Status do seu pedido de numero: <span class="text-lg">{{$order->id ?? ''}}</span></p>
                      <p class="text-yellow  ">{{$order->status ?? ''}}</p>
              
                </div>
              </div>
      
              <div class="">
                @include('layouts.baner')
              </div>
         
          </div>
            <div class="pb-8  bg-orange-500 p-2">
              @include('layouts.menu')
            </div>
           @if(session('success'))
               <div class=" success text-center  bg-white ">
                <p>{{ session('success')}}</p>
               </div>
           @endif
        <div class=" orange bg-orange-500  w-full">
             <table class="w-full">
              <thead>
                <tr>
                     <th></th>      
                    <th class="p-2">LANCHES</th>
                    <th class="p-2">INGREDIENTES</th>
                    <th class="pl-8" >PREÇO</th>
                </tr>
              </thead>
              <tbody class="">
                @foreach ($product as $products)
                    <tr>
                     <td class="">
                   
                          @if ($toggle->is_open ?? '' )
                              
                              <button class="btn btn-success ml-2" data-bs-toggle="modal"
                                  data-bs-target="#firstModal{{$products->id}}">
                                  <i class="fa-sharp fa-solid fa-cart-plus text-white"></i>
                              </button>

                          @else  

                            @include('layouts.button')

                          @endif

                        <div class="modal fade" id="firstModal{{$products->id}}" tabindex="-1"
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
                                        <Form action="{{ route('store.cart',$products->id)}}" method="post">
                                            @csrf
                                            <div class="text  pt-4 rounded">
                                              <form class="grup-control">
                                                  <fieldset>
                                                        <div class="label text-center">
                                                            <strong><h1>PRODUTO</h1></strong>
                                                            <input type="text" disabled class=" p-2  rounded "  name="product_id" id="product_id" value="{{ $products->name }}"/><br>
                                                        </div>
                                                        <div class=" mt-2 label2 text-center">
                                                            <strong><h1>DESCRIÇÃO</h1></strong>
                                                            <input type="text" disabled class=" p-2 rounded " id="description" value="{{ $products->description }}"/><br>
                                                        </div>
                                                        <div class=" mt-2 label2 text-center">
                                                           <strong><h1>QUANTIDADE</h1></strong>
                                                            <input type="number" min="1"  class=" p-2  rounded text-center " name="quanty" value="{{ $products->quanty }}"/><br>
                                                        </div>
                                                        <div class="label3 text-center p-2">
                                                            <strong><h1>PREÇO UNITARIO</h1></strong>
                                                            <input type="text"  disabled class=" rounded text-center " name="price" id="price" value="{{number_format($products->price,2,',','.') }}"/><br>
                                                        </div>
                                                        <div class="text-center p-2">
                                                            <strong><label for="additional">ADICIONAIS</label></strong>
                                                            </div>
                                                        <div class="text-center  rounded multiselect-container ">

                                                            <select  class=" rounded" name="additional[]" multiple="multiple">
                                                                @foreach( $adde as $add)
                                                                  
                                                                    <option value="{{$add->id}}" name="{{$add->name}}" >
                                                                      {{$add->name}}-R$- @money($add->price)
                                                                    </option>
                                                                  
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                        <div class=" p-2 text-center">
                                                          <strong><h1>OBSERVAÇÃO</h1></strong>
                                                          <input type="text" autocomplete="off" class="  rounded " placeholder="Ex: sem tomate" name="observation" id="observation" value="{{$products->observation}}">
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
                    </td> 
                    <td class="p-4 sm:w-60">{{$products->name}} <hr class="linear-1"></td>
                    <td class="">
                        <details>
                        <summary>INGREDIENTES</summary>
                        <p class="text-start text-white mr-12 border border-blue-800 color p-2 rounded">{{$products->description}}</p>
                        </details>
                        <hr class="linear">
                    </td>
                    <td class="pl-16 text-2xl text-white price">R$_{{ number_format($products->price, 2, ',','.')}}</td>
                    </tr>
                @endforeach
              </tbody>
            </table>
              <div class="">
                  {{   $product->links() }}
              </div>
        </div>
         @vite('resources/js/app.js')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    </body>
  </html>

  

  

  
