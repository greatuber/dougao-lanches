
<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <script src="https://kit.fontawesome.com/03e947ed86.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   <title>Create New Aditional</title>
</head>
<body>
   @vite('resources/css/app.css')

 <div class="container pt-4">

   <h1 class="pt-2 font-bold text-center">CASDASTRAR NOVO ADICIONAL</h1>
   <form action="{{route('create.additional')}}" class=" bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 " method="post">
     @csrf
     <div class="mb-4">
       <label class="block text-gray-700 text-sm font-bold mb-2" for="Produto">NOME</label>
       <input autocomplete="off"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="digite nome do produto" name="name">
           @error('name')
               <span class="error text-red-600">{{ $message }}</span>
           @enderror
     </div>

     <div class="mb-6">
       <label class="block text-gray-700 text-sm font-bold mb-2" for="price">PREÇO</label>
       <input autocomplete="off" class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="price" type="text" placeholder="digite o preço do produto" name="price">
           @error('price')
               <span class="error text-red-600">{{ $message }}</span>
           @enderror
       {{-- <p class="text-red-500 text-xs italic">Please choose a password.</p> --}}
     </div>

     <div class="flex items-center justify-between">
       <button class="bg-blue-500 hover:bg-blue-700 border font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
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

      @if (session('deleted'))

         <div class="text-green-600">
             {{ session('deleted')}}
         </div>

      @endif
   </form>

    @if (session('updated'))
       <div class="text-green-600">

         {{ session('updated')}}

       </div>

    @endif
   <div class="container pt-2 ml-4">
    <table class="">
      <thead>
        <tr>
          <th class="px-6 py-3">NOME</th>
          <th class="px-6 py-3">PREÇO</th>
          <th >AÇÕES</th>
        </tr>

      </thead>
      <tbody>
        @foreach ($additional as $item)
        <tr class=" space-x-2">
          <td class="px-6 py-3">{{ $item->name}}</td>
          <td class="px-6 py-3">@money($item->price)</td>
            <form action="{{ route('additional.delete',$item->id)}}" method="post">
               @csrf

          <td>
            <button type="submit">
              <i class="icon fa-sharp fa-solid fa-trash fa-2xl text-red-500"></i>
            </button>
          </td>

            </form>


              <td>
                <button class="btn btn-success" data-bs-toggle="modal"
                  data-bs-target="#firstModal{{$item->id}}">
                  <i class="fa-regular fa-pen-to-square "></i>
                </button>
                <div class="modal fade" id="firstModal{{$item->id}}" tabindex="-1"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header,btn btn-warning">
                            <div class="text-center">
                              <h1 class="modal-title pt-4" id="exampleModalLabel">ATUALIZAR</h1>
                            </div>

                              <button type="button" class="btn-close" data-bs-dismiss="modal"   aria-label="Close">
                              </button>
                          </div>
                          <div class="modal-body">
                              <form action="{{ route('additional.update',$item->id)}}" method="post">
                                  @method('PUT')
                                  @csrf
                                  <div class="text">
                                    <form class="grup-control">
                                        <fieldset>
                                            <div class="label text-center">

                                              <h1>PRODUTO</h1>

                                              <input type="text" class=" rounded" name="name" value="{{ $item->name }}"/><br>
                                            </div>

                                            <div class="label3 text-center">
                                              <h1>PREÇO</h1>
                                              <input type="text" class=" rounded" name="price" value="@money($item->price)"/><br>
                                            </div>
                                          <button class="btn btn-primary text-with bg-primary mt-2" type="submit">Atualizar</button>
                                        </fieldset>
                                    </form>
                                  </div>
                              </form>
                          </div>
                              <div class="modal-footer mt-10">
                                <button type="button" class="btn btn-warning"
                                  data-bs-dismiss="modal">Cancelar
                                </button>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              </td>



        </tr>

        @endforeach

      </tbody>
    </table>
        <a href="{{ route('panel.admin')}}">
            <button class="bg-blue-500 hover:bg-blue-700 border font-bold py-2 px-4  rounded focus:outline-none focus:shadow-outline" type="submit">
                Voltar
            </button>
        </a>

</div>

 </div>




       @vite('resources/js/app.js')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
