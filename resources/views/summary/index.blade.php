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
 
</head>
<body>
  <div class="container mx-auto pt-2 ">
     <div class="text-center">
           
            <div class="container mx-auto pt-2">
                <div class="text-center">
                    <h1 class="font-bold pt-2">RESUMO DE TODOS OS PEDIDOS</h1>
                </div>
        
                <form action="{{ route('summary.filter') }}" method="post">
                    @csrf
                    <div class="my-4">
                        <label for="start_date">Data de início:</label>
                        <input type="date" name="start_date" id="start_date">
                    </div>
                    <div class="my-4">
                        <label for="end_date">Data de término:</label>
                        <input type="date" name="end_date" id="end_date">
                    </div>
                    <button type="submit" class="btn btn-primary text-black mb-4">Filtrar</button>
                </form>
                <a href="{{ route('panel.admin')}}">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Voltar
                    </button>
                </a>
            </div>

     </div>
  

  
             
</body>
</html>
 