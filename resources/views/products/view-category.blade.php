<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <script src="https://kit.fontawesome.com/03e947ed86.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   <title>Create New category</title>
</head>
<body>
   @vite('resources/css/app.css')

 <div class="container pt-4">
     
   <h1 class="pt-2 font-bold text-center">CASDASTRAR NOVA CATEGORIA</h1>
   <form action="{{route('create.category')}}" class=" bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 " method="post">
      @csrf
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="Produto">NOME</label>
          <input autocomplete="off"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="digite nome do produto" name="name">
              @error('name')
                  <span class="error text-red-600">{{ $message }}</span>
              @enderror
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
        @if(session('deleted'))
            <div class="text-green-600">
              {{ session('deleted')}}
            </div>
        @endif
   </form>

    
      <div class="container pt-2 ml-4">
          <table class="">
            <thead>
              <tr>
                <th class="px-6 py-3">NOME</th>
                <th>AÇOẼS</th>
              </tr>
                
            </thead>
            <tbody>
              @foreach ($category as $item)
              
              <tr class=" space-x-2">
                <td class="px-6 py-3">{{ $item->name}}</td>
                  <form action="{{ route('category.delete',$item->id)}}" method="post">
                     @csrf
                     
                      <td>
                        <button type="submit">
                         EXCLUIR
                        <i class="icon fa-sharp fa-solid fa-trash text-red-500 fa-2xl"></i>
                      </button>
                      </td>
                  
                  </form>
              </tr>
            
              @endforeach
                
            </tbody>
          </table>

      </div>
      <a href="{{ route('panel.admin')}}">
        <button class="bg-blue-500 hover:bg-blue-700 border font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            Voltar
        </button>
    </a>

 </div>




       @vite('resources/js/app.js')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>