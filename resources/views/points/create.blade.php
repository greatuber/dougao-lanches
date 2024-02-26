<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <script src="https://kit.fontawesome.com/03e947ed86.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   <title>Create New Brinde</title>
</head>
<body>
   @vite('resources/css/app.css')

 <div class="container pt-4">
     @if(session('create'))
        <div class="text-center text-green-500">
            <p>{{ session('create')}}</p>
        </div>
     @endif
     
   <h1 class="pt-2 font-bold text-center">CASDASTRAR NOVO BRINDE</h1>
   <form action="{{route('upload.points')}}" class=" bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 " method="post" enctype="multipart/form-data">
     @csrf
     <div class="mb-4">
       <label class="block text-gray-700 text-sm font-bold mb-2" for="Produto">PRODUTO</label>
       <input autocomplete="off"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="digite nome do produto" name="name">
           @error('name')
               <span class="error text-red-600">{{ $message }}</span>
           @enderror
     </div>

     <div class="mb-6">
       <label class="block text-gray-700 text-sm font-bold mb-2" for="discrição"> IMAGEM</label>
       <input autocomplete="off" class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="description" type="file" placeholder="digite a discrição do produto" name="image">
           @error('description')
               <span class="error text-red-600">{{ $message }}</span>
           @enderror
       {{-- <p class="text-red-500 text-xs italic">Please choose a password.</p> --}}

     </div>
     <div class="mb-6">
       <label class="block text-gray-700 text-sm font-bold mb-2" for="price">PONTOS</label>
       <input autocomplete="off" class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="price" type="text" placeholder="digite o preço do produto" name="points">
           @error('price')
               <span class="error text-red-600">{{ $message }}</span>
           @enderror
       {{-- <p class="text-red-500 text-xs italic">Please choose a password.</p> --}}
     </div>

   

     <div class="flex items-center justify-between">
       <button class="bg-blue-500 hover:bg-blue-700 border text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
         cadastrar
       </button>
   
       {{-- <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
         Forgot Password?
       </a> --}}
     </div>
 
   </form>
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