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

    <title>CreateProduct</title>
</head>
<body>
    @vite('resources/css/app.css')
    <div class="container ">
       <div class="text-center sm:ml-32 ml-32">
           <div class="w-full center">
        
             
               <h1 class="pt-2 font-bold">CASDASTRAR NOVO PRODUTO</h1>
             <form action="{{route('store.product')}}" class=" bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 " method="post">
               @csrf
               <div class="mb-4">
                 <label class="block text-gray-700 text-sm font-bold mb-2" for="Produto">PRODUTO</label>
                 <input autocomplete="off"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="digite nome do produto" name="name">
                 @error('name')
                   <span class="error text-red-600">{{ $message }}</span>
                 @enderror
               </div>
       
               <div class="mb-6">
                 <label class="block text-gray-700 text-sm font-bold mb-2" for="discrição"> DESCRIÇÃO</label>
                 <input autocomplete="off" class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="description" type="text" placeholder="digite a discrição do produto" name="description">
                 @error('description')
                 <span class="error text-red-600">{{ $message }}</span>
               @enderror
                 {{-- <p class="text-red-500 text-xs italic">Please choose a password.</p> --}}
       
               </div>
               <div class="mb-6">
                 <label class="block text-gray-700 text-sm font-bold mb-2" for="price">PREÇO</label>
                 <input autocomplete="off" class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="price" type="text" placeholder="digite o preço do produto" name="price">
                 @error('price')
                 <span class="error text-red-600">{{ $message }}</span>
               @enderror
                 {{-- <p class="text-red-500 text-xs italic">Please choose a password.</p> --}}
               </div>

               <div class="mb-6">
                 <label class="block text-gray-700 text-sm font-bold mb-2" for="price">CATEGORIA</label>
                
                 <select name="category" id="category"class="rounded ">
                   @foreach ($category as $item)
                       <option name="category" value="{{$item->id}}">{{$item->name}}</option>
                   @endforeach
                 </select>
               </div>
          
               <div class="flex items-center justify-between">
                 <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                   cadastrar
                 </button>
                 {{-- <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
                   Forgot Password?
                 </a> --}}
               </div>
               @if(session('success'))
               <div class="text-green-600">
                   {{ session('success')}}  
               </div>
             @endif
             </form>
         
                
         <div class="w-full">
           
          <div class="  text-center pr-4 bg-orange-500 rounded">
             <div class="text-center p-2 text-white font-bold"> <h1>CATEGORIAS</h1></div>
             <div class="">
                <a href="{{ route('showbeer')}}" class=""><div class=" hover:bg-blue-700  border text-white p-2 mt-2 ml-2 rounded font-bold">BEBIDAS</div></a>
                <a href="{{ route('showcombo')}}"><div class=" hover:bg-blue-700  border text-white p-2 rounded mt-2 ml-2 font-bold">COMBOS</div></a>
                <a href="{{ route('create.product')}}"><div class=" hover:bg-blue-700  border text-white p-2 rounded mt-2 ml-2 font-bold">LANCHES</div></a>
                <a href="{{ route('user.bomboniere')}}"><div class=" hover:bg-blue-700  border text-white p-2 rounded mt-2 ml-2 font-bold">BOMBONIÉRE</div></a>
                <a href="{{ route('order.show')}}"><div class=" hover:bg-blue-700  border text-white p-2 rounded mt-2 ml-2 font-bold">PEDIDOS</div></a>
                <a href="{{ route('client.show')}}"><div class=" hover:bg-blue-700  border text-white p-2 rounded mt-2 ml-2 font-bold">USER</div></a>
             </div>
         </div>

         {{-- <div class=" flex text-cnter  bg-orange-500">
           <a href="{{ route('showbeer')}}" class=""> <div class=" hover:bg-blue-700  border text-white p-2 mt-2 ml-12 rounded font-bold">BEBIDAS/USER</div></a>
           <a href="{{ route('showcombo')}}">   <div class=" hover:bg-blue-700  border text-white p-2 rounded mt-2 ml-2 font-bold">COMBOS/USER</div></a>
          <a href="{{ route('create.product')}}">  <div class=" hover:bg-blue-700  border text-white p-2 rounded mt-2 ml-2 font-bold">LANCHES/USER</div></a>
        </div> --}}
         </div>

           <div class=" orange bg-orange-500 w-full  pr-4 overflow-auto">
             <table class="w-full  ">
                <thead>
                  <tr>
                        {{-- <th></th>       --}}
                      <th class="p-2">LANCHES</th>
                      <th class="p-2">INGREDIENTES</th>
                      <th class="p-2" >PREÇO</th>
                      
                      
                  </tr>
                </thead>
              
              
                
               <tbody class="">
                 @foreach ($product as $products)
                
                 <tr>
                   {{-- <td class="">{{$products->id}}-</td> --}}
                   <td class="p-4 sm:w-60">{{$products->name}} <hr class="linear-1"></td>
                   <td class="">
                      <details>
                            <summary>INGREDIENTES</summary>
                            <p class="text-center mr-12 border border-blue-800 bg-slate-900 p-2 rounded">{{$products->description}}</p>
                      </details>
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
                                                    <div class="label">
                                                      <h1>PRODUTO</h1>
                                                      <input type="text" class=" m-2 bg-info rounded" name="name" value="{{ $products->name }}"/><br>
                                                    </div>
                                                    <div class="label2">
                                                      <h1>DESCRIÇÃO</h1>
                                                      <input type="text" class=" m-2 bg-info rounded" name="description" value="{{ $products->description }}"/><br>
                                                    </div>
                                                    <div class="label3">
                                                      <h1>PREÇO</h1>
                                                      <input type="number" class="bg-info rounded m-2" name="price" value="{{$products->price}}"/><br>
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
                    
                      
                      <div class="pr-4 produto flex" >
                        <form action="{{ route('delete.product',$products->id)}}" method="post">
                            @method( 'DELETE' )
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
             <p class="text-center text-gray-500 text-xs">
        
               &copy;2023 todos os direitos reservados.
             </p>
         </div>
    </div>
    {{-- {{ $product->links()}} --}}

    @vite('resources/js/app.js')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
 