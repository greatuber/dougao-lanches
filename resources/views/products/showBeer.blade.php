
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/03e947ed86.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>

      .orange {
        width: 400px;
        border-radius: 8px;
       
      }
    .icon {
      font-size: 30px;
    color: white;
    margin-left: 15px;
    margin-top: 3px;

    }

    </style>

    <title>BeerProduct</title>
</head>
<body>
    @vite('resources/css/app.css')

    <div class="container">
            
      <div class="baner p-12">
        @include('layouts.baner')
      </div>

    <div class="">
      <div class=" flex text-cnter  bg-orange-500">
        <a href="{{ route('showcombo')}}">   <div class=" border text-white p-2 rounded mt-2 ml-2 font-bold">COMBOS</div></a>
        <a href="{{ route('create.product')}}">  <div class=" border text-white p-2 rounded mt-2 ml-2 font-bold">LANCHES</div></a>
        <a href="{{ route('user.bomboniere')}}">  <div class=" border text-white p-2 rounded mt-2 ml-2 font-bold">BOMBONIÉRE</div></a>
     </div>

     {{-- <div class=" flex text-cnter  bg-orange-500">
      <a href="{{ route('showbeer')}}"> <div class=" border text-white p-2 mt-2 ml-12 rounded font-bold">BEBIDAS/USER</div></a>
      <a href="{{ route('showcombo')}}">   <div class=" border text-white p-2 rounded mt-2 ml-2 font-bold">COMBOS/USER</div></a>
     <a href="{{ route('create.product')}}">  <div class=" border text-white p-2 rounded mt-2 ml-2 font-bold">LANCHES/USER</div></a>
   </div> --}}
    </div>
            
        <div class=" orange bg-orange-500 w-full sm:w-40 pr-4 ">
            <table class="w-full ">
              <thead>
                <tr>
                     {{-- <th></th>       --}}
                    <th class="p-2">BEBIDAS</th>
                    <th class="p-2">DESCRIÇÃO</th>
                    <th class="p-12" >PREÇO</th>
                </tr>
              </thead>
              <tbody class="">
                @foreach ($product as $products)
                <tr>
                  {{-- <td class="">{{$products->id}}-</td> --}}
                  <td class="p-4 sm:w-60">{{$products->name}} <hr class="linear-1"></td>
                  <td class="">
                 
                      <p class=" bg-slate-900  ">{{$products->description}}</p>
                   
                    <hr class="linear">
                  </td>
                  <td class="">{{number_format($products->price,2,',','.')}}</td>
                  <td class="p-2 flex">
                   <button class="btn btn-success" data-bs-toggle="modal"
                   data-bs-target="#firstModal{{$products->id}}"><i class="fa-regular fa-pen-to-square "></i></button>
                     <div class="modal fade" id="firstModal{{$products->id}}" tabindex="-1"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                         <div class="modal-dialog">
                             <div class="modal-content">
                                 <div class="modal-header,btn btn-warning">
                                     <h5 class="modal-title pt-4" id="exampleModalLabel">Atualizar</h5>
                                     <button type="button" class="btn-close" data-bs-dismiss="modal"   aria-label="Close">
                                     </button>
                                 </div>
                                 <div class="modal-body">
                                     <Form action="{{ route('update.product',$products->id)}}" method="post">
                                         @method('PUT')
                                         @csrf
                                         <div class="text">
                                           <form class="grup-control">
                                               <fieldset>
                                                   <div class="label text-center ">
                                                     <h1>PRODUTO</h1>
                                                     <input type="text" class="bg-info rounded" name="name" value="{{ $products->name }}"/><br>
                                                   </div>
                                                   <div class="label2 text-center m-2">
                                                     <h1>DESCRIÇÃO</h1>
                                                     <input type="text" class="bg-info rounded" name="description" value="{{ $products->description }}"/><br>
                                                   </div>
                                                   <div class="label3 text-center m-2">
                                                     <h1>PREÇO</h1>
                                                     <input type="number" class="bg-info  rounded" name="price" value="{{ $products->price }}"/><br>
                                                   </div>
                                                 <button class="btn btn-primary text-with bg-primary mt-2" type="submit">Atualizar</button>
                                               </fieldset>
                                           </form>
                                         </div>
                                     </Form>
                                 </div>
                                     <div class="modal-footer mt-10">
                                     <button type="button" class="btn btn-warning"
                                         data-bs-dismiss="modal">Cancelar</button>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="pr-4 flex" >
                       <form action="{{ route('delete.product',$products->id)}}" method="post">
                         @method('DELETE')
                         @csrf
                         <button type="submit" class="" onclick="preventDefoult">
                           <i class="icon fa-sharp fa-solid fa-trash"></i>
                         </button>
                       </form>
                       
                       <form action="{{ route('product.update',$products->id)}}" method="POST" >
                        @csrf
                            <button type="submit" 
                            class="toggle-button bg-white p-2 ml-2 rounded 
                                @if($products->status == 0) inertex @endif">
                            
                                @if($products->status == 0)
                                  Desativar
                                @else
                                  Ativar
                                @endif
                            </button>
                 
                        </form>
                     </div>
                 </td>
                 <td>
                 
                 </td>
                </tr>
                @endforeach
              </tbody>
            </table>
         </div>

    </div>


    @vite('resources/js/app.js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
