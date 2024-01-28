

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
    <title>BLINDES</title>
</head>
<body>
    @vite('resources/css/app.css')
     <div class="container">
        <div class="container">
            <h2 class="text-center p-2 font-bold">BLINDES ENTREGUÊS</h2>
                @if( session('entregue'))
                    <div class="successes">
                    <p>
                        {{session('entregue')}}
                    </p>
                    </div>

                @endif
            <table class="table overflow-auto">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Produto</th>
                        <th>Pontos</th>
                        <th>Estatus</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($blinds as $blindItem)
                        <tr>
                        
                            @csrf
                            <td>{{ $blindItem->blindUser->name }}</td>
                            <td>{{ $blindItem->name }}</td>
                            <td>{{ $blindItem->points }}</td>
                            <td>{{ $blindItem->status }}</td>
                        
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            <a href="{{ route('panel.admin')}}">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Voltar
                </button>
            </a>
     </div>
   
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>






