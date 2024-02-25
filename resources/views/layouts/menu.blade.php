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
        .custom-border {
        border: 2px solid #28a745; 
        border-radius: 10px; 
        box-shadow: 0 0 10px rgba(40, 167, 69, 0.5); 
        transition: border-color 0.3s ease-in-out; 
        }

        .custom-border:hover {
            background-color: #57cf71; 
            color: white;
            border: 2px solid white;
        }
    </style>
</head>
<body>
    <div class="nav h-12 w-full pt-12 overflow-auto pr-2">
        <ul class="folat-right mr-10 pl-4 space-y-8 text-gray-700 font-bold">
            <div class="flex space-x-8 ml-4 p-8 ">
                @can('access')
                <li  class="custom-border p-2 rounded bg-orange-300 "><a class="p-8" href="{{ route('panel.admin')}}">ADMINISTRADOR</a></li>
                @endcan
                <li  class="custom-border p-2 rounded bg-orange-300 ">
                    <a href="{{ route('client.show')}}">LANCHES</a>
                </li>
                <li  class="custom-border p-2 rounded bg-orange-300 ">
                    <a href="{{ route('users.beer')}}">BEBIDAS</a>
                </li>
                <li  class="custom-border p-2 rounded bg-orange-300 ">
                    <a href="{{ route('user.combo')}}">COMBOS</a>
                </li>
                <li  class="custom-border p-2 rounded bg-orange-300 ">
                    <a href="{{ route('show.bomboniere')}}">BOMBONIÉRE</a>
                </li>
            </div>
        </ul>
    </div>
</body>
</html>