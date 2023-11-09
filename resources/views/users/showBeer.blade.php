

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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
      .container {
      }
      .orange {
        border-radius: 8px;
        margin-right: 8px; 
        padding: 8px;
      }
    .icon {
      font-size: 30px;
    color: red;
    margin-left: 15px;
    margin-top: 3px;
    }
    .cart{
            float:right;
            margin-top: 15px;
            padding-right: 10px;
          }
    </style>
    <title>CreateProduct</title>
</head>
<body>
    @vite('resources/css/app.css')
    <div class="baner p-12 ">
      <div class="cart">
        <a href="{{ route('cart.show')}}"><i class="fa-solid fa-cart-shopping text-white"></i></i></a>
        <p class="text-white text-sm">minhas compras</p>
      </div>
          <div class="" @if ($toggle->is_open == 0)  inertex @endif>
            @if ($toggle->is_open == 0)
              Lanchonete fechada
            @else
              Lanchonete aberta
            @endif
          </div>
        @include('layouts.baner')
    </div>
    <div class="pb-8 pt-4 bg-orange-500">
      @include('layouts.menu')
    </div>
    <div class=" orange bg-orange-500 w-full h-full">
        <table class="w-full ">
          <thead>
            <tr>
                 <th></th>      
                <th class="">BEBIDAS</th>
                <th class="p-2">DESCRIÇÃO</th>
                <th class="p-2" >PREÇO</th>
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
                      <button class="btn btn-success ml-2" disabled>
                        <i class="fa-sharp fa-solid fa-cart-plus text-white"></i>
                      </button>
                 @endif

                    <div class="modal fade" id="firstModal{{$products->id}}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header,btn btn-warning">
                                    {{-- <h2 class="modal-title pt-4 ml-40" id="exampleModalLabel text-center">Adiciona este produto em seu carrinho</h2> --}}
                                    <button type="button" class="btn-close " data-bs-dismiss="modal"   aria-label="Close">X
                                    </button>
                                </div>
                                <div class="modal-body bg-orange-500">
                                    <Form action="{{ route('store.cart',$products->id)}}" method="post">
                                        @csrf
                                        <div class="text bg-secondary-subtle">
                                          <form class="grup-control">
                                              <fieldset>
                                                  <div class="label text-center">
                                                    <h1>PRODUTO</h1>
                                                    <input type="text" disabled class="   p-2  rounded" name="products_id" value="{{ $products->name }}"/><br>
                                                  </div>
                                                  <div class=" mt-2 label2 text-center">
                                                    <h1>DESCRIÇÃO</h1>
                                                    <input type="text" disabled class="    p-2  rounded" name="description" value="{{ $products->description }}"/><br>
                                                  </div>
                                                  <div class=" mt-2 label2 text-center">
                                                    <h1>QUANTIDADE</h1>
                                                    <input type="number"  class=" p-2   rounded" name="quanty" value="{{ $products->quanty }}"/><br>
                                                  </div>
                                                  <div class="label3 text-center p-2">
                                                    <h1>PREÇO</h1>
                                                    <input type="text" disabled class="  rounded" name="price" value="{{number_format($products->price,2,',','.') }}"/><br>
                                                  </div>
                                                <div class="flex flex-col gap-2">
                                                  <button class="btn btn-primary text-with bg-success m-2" type="submit">ADICIONAR</button>
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
                </td> 
                <td class="p-4 sm:w-60">{{$products->name}} <hr class="linear-1"></td>
                <td class="">
                    <p class="">{{$products->description}}</p>
                </td>
                <td class="text-white font-bold">R$-@money($products->price)</td>
                <td class="p-2">
                </td>
                </tr>
            @endforeach
          </tbody>
        </table>
        <div class="">
          {{ $product->links()}}
        </div>
     </div>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>






