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
   .green {
    background-color: rgb(21, 185, 21);
   }

  
    </style>

    <title>CreateProduct</title>
</head>
<body>
    @vite('resources/css/app.css')

    <div class="container pt-2">
     
       <div class="text-center sm:ml-32 ml-32">
          <div class=" center">
            

                  @if ( session('update'))
                      <p class="text-green-600 ">{{ session('update')}}</p>
                  @endif

                  @if (session('delete'))
                  
                  <div class="text-green-600">
                      {{ session('delete')}}
                  </div>
                    
                @endif
              <div class="text-center pt-2">
                <h1>ÁREA ADMINISTRATIVA</h1>
                 <h2>aqui você pode excluir,editar ou desativar um lanche</h2>
           </div>

         <div class=" ">
           <div class=" flex">
             <a href="{{ route('showbeer')}}"> <div class=" border text-black p-2 mt-2 ml-12 rounded font-bold">BEBIDAS</div></a>
             <a href="{{ route('user.bomboniere')}}">  <div class=" border text-black p-2 rounded mt-2 ml-2 font-bold">BOMBONIÉRE</div></a>
             <a href="{{ route('showcombo')}}"><div class=" border text-black p-2 rounded mt-2 ml-2 font-bold">COMBOS</div></a>
         </div>
           <div class=" w-full  pr-4 overflow-auto">
                <table class="w-full  ">
                      <thead>
                        <tr>
                              {{-- <th></th>       --}}
                            <th class="p-2">LANCHES</th>
                            <th class="p-2">INGREDIENTES</th>
                            <th class="p-2" >PREÇO</th>
                            <th class="">AÇOẼS</th>
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
                                        <p class="text-center mr-12 border border-blue-800 bg-white p-2 rounded">{{$products->description}}</p>
                                  </details>
                                <hr class="linear">
                              </td>
                              <td class="">{{number_format($products->price,2,',','.')}}</td>
                              
                          

                              <td class="p-2  flex max-w-full">
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
                                                                  <input type="" class="bg-info rounded m-2" name="price" value="{{number_format($products->price,2, ',', '.')}}"/><br>
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
                                
                                  
                                  <div class="pr-2 produto flex flex-row lg:flex-row  w-full" w-full>
                                    <form action="{{ route('delete.product',$products->id)}}" method="post">
                                        @method('DELETE' )
                                        @csrf
                                        <button type="submit" class="" onclick="preventDefoult">
                                          <i class="icon fa-sharp fa-solid fa-trash text-red-500"></i>
                                        </button>
                                    </form>

                                    <form action="{{ route('product.update',$products->id)}}" method="POST" >
                                        @csrf
                                    <div class="flex">
                                          <div class="">
                                            <button type="submit" 
                                                class="toggle-button bg-white p-2 ml-2 rounded 
                                                @if($products->status == 0) inertex @endif">
                                                {{-- <i class="fa-solid fa-toggle-on"></i> --}}
                                            
                                                @if($products->status == 0)

                                                  <p class="pr-2 ">Desativar</p> 
                                                  
                                                @else
                                                  Ativar
                                                
                                                @endif
                                            </button>
                                          </div>

                                          <div class="">
                                              @if($products->status == 0)
                                              <button class="green text-white p-2 rounded ml-2 " onclick="preventDefoult"><i class="fa-regular fa-eye"></i></button>
                                              @else
                                              <button class="bg-white text-red-500 p-2 ml-2 rounded"><i class="fa-sharp fa-solid fa-eye-slash"></i></button>
                                              @endif
                                          </div>
                                    </div>
                                        
                                    </form>
                                  </div>
                                  
                              </td>
                              <td>
                              
                              </td>
                            </tr>
                        @endforeach
                      </tbody>
                </table>
                <a href="{{ route('panel.admin')}}">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Voltar
                    </button>
                </a>
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
 