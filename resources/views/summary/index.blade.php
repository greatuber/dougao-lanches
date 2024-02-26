<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/03e947ed86.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>centerCart</title>
    @vite('resources/css/app.css')

    <style>
        .yellow{
            background-color: yellow;
            color: red;
        }
    </style>
 
</head>
<body>
  <div class="container mx-auto pt-2 ">
     <div class="text-center">
               @if ($errors->any())
                 @foreach ($errors->any() as $error)
                      <div class="">
                         <p>
                            {{$error}}
                         </p>
                      </div>
                 @endforeach
                   
               @endif

                @if(session('nfound'))
                   <div class="yellow p-2 rounded">
                    {{session('nfound')}}
                   </div>
                @endif

            <div class="container mx-auto pt-2">
                <div class="text-center">
                    <h1 class="font-bold pt-2">RESUMO DE TODOS OS PEDIDOS</h1>
                </div>
        
                <form action="{{ route('summary.filter') }}" method="post">
                    @csrf
                    <div class="my-4">
                        <label for="start_date">Data de início:</label>
                        <input type="date" class="rounded" name="start_date" id="start_date">
                    </div>
                    <div class="my-4">
                        <label for="end_date">Data de término:</label>
                        <input type="date" class="rounded" name="end_date" id="end_date">
                    </div>
                    <button type="submit" class="border  p-2 bg-blue-500 hover:bg-blue-700 mb-2 rounded">Filtrar</button>
                </form>
                <a href="{{ route('panel.admin')}}">
                    <button class="bg-blue-500 hover:bg-blue-700 border font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Voltar
                    </button>
                </a>
            </div>
               <a href="{{route('summary.sales')}}" class=" p-2 mt-2">
                <button type="submit" class="mt-4 border bg-blue-500 p-2 rounded">GRAFICO DE VENDAS DO MÊS</button>
               </a>

               <a href="{{route('summary.product')}}" class=" p-2 mt-2">
                <button type="submit" class="mt-4 border bg-blue-500 p-2 rounded">GRAFICO DE LANCHE MAIS VENDIDO</button>
               </a>
     </div>
  
     <canvas id="salesChart" width="800" height="400"></canvas>

   
    
             
</body>
</html>
 