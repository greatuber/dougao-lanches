<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chela+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>status.navegation</title>

    <style>
            .button {
                background-color: rgb(241, 238, 238);
           
            }
         
    </style>
</head>
<body>
    @vite('resources/css/app.css')
    <div class="pb-4 pt-4 mr-12 text-sm">
            
        <ul class="flex content-center">
                <li class="mr-6">
                    <a class=" hover:text-blue-800" href="{{ route('order.show')}}"><button class="border rounded p-2 m-2 button">listagem de pedidos</button></a>
                </li>
                <li class="mr-6 ">
                    <a class=" hover:text-blue-800 " href="{{ route('status.aceito')}}"><button class="border rounded p-2 m-2  button">pedidos aceito</button></a>
                </li>
                <li class="mr-6">
                    <a class=" hover:text-blue-800" href="{{ route('production.index')}}"><button class="border rounded p-2 m-2 button">pedidos em produção</button></a>
                </li>
                <li class="mr-6">
                    <a class=" hover:text-blue-800" href="{{ route('status.fordelivery')}}"><button class="border rounded p-2 m-2 button">saiu para entrega</button></a>
                </li>
                <li class="mr-6">
                    <a class=" hover:text-blue-800" href="{{ route('status.delivered')}}"><button class="border rounded p-2 m-2 button">pedidos entregue</button></a>
                </li>
            </ul>
    </div> 
    @vite('resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>