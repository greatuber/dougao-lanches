<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/03e947ed86.js" crossorigin="anonymous"></script>
    <title>Menu</title>
    <style>
        .flex{
            text-align: center;
        }
        li {
            padding-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="nav h-12 w-full pt-12 ">
        <ul class="folat-right mr-10 pl-4 space-y-8 text-black fixed">
         <div class="flex space-x-8 ml-4 p-8 text-white">
            @can('access')
            <li><a class="p-8" href="{{ route('create.product')}}">adim/cadastrar</a></li>
            @endcan
            <li><a href="{{ route('client.show')}}">LANCHES</a></li>
            <li><a href="{{ route('users.beer')}}">BEBIDAS</a></li>
            <li><a href="{{ route('user.combo')}}">COMBOS</a></li>
            <li><a href="{{ route('show.bomboniere')}}">BOMBONIÉRE</a></li>
         </div>
        </ul>
    </div>
</body>
</html>