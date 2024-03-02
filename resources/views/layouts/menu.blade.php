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
        .small-li {
        font-size: 10px;
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
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="pr-2  overflow-auto w-full">
        <ul class="folat-right mr-10 pl-4  text-gray-700 ">
            <div class="flex space-x-8 ml-4 p-8">
                @can('access')
                <li  class="custom-border p-2 rounded bg-orange-300 small-li">
                    <a class="p-8" href="{{ route('panel.admin')}}">ADMIN</a>
                </li>
                @endcan
                <li  class="custom-border p-2 rounded bg-orange-300 small-li">
                    <a href="{{ route('client.show')}}">LANCHES</a>
                </li>
                <li  class="custom-border p-2 rounded bg-orange-300 small-li">
                    <a href="{{ route('users.beer')}}">BEBIDAS</a>
                </li>
                <li  class="custom-border p-2 rounded bg-orange-300 small-li">
                    <a href="{{ route('user.combo')}}">COMBOS</a>
                </li>
                <li  class="custom-border p-2 rounded bg-orange-300 small-li">
                    <a href="{{ route('show.bomboniere')}}">BOMBONIÉRE</a>
                </li>
            </div>
        </ul>
    </div>
    @vite('resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>