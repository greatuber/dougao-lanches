<x-app-layout>
  
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://kit.fontawesome.com/03e947ed86.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <style>
          .container {
            
          }
          .orange {
            width: 400px;
            border-radius: 8px;
           
          }
        .icon {
          font-size: 30px;
        color: red;
        margin-left: 15px;
        margin-top: 3px;
    
        }
        </style>
    
        <title>CreateProduct</title>
    </head>
    <body>
        @vite('resources/css/app.css')
     @yield('dashboard')
        <div class=" orange bg-orange-500 w-full sm:w-40 pr-4 overflow-auto">
            <table class="w-full ">
              <thead>
                <tr>
                     {{-- <th></th>       --}}
                    <th class="p-2">LANCHES</th>
                    <th class="p-2">INGREDIENTES</th>
                    <th class="p-12" >PREÇO</th>
                </tr>
              </thead>
            
              <tbody class="">
                @foreach ($product as $products)
                    <tr>
                    {{-- <td class="">{{$products->id}}-</td> --}}
                    <td class="p-4 sm:w-60">{{$products->name}} <hr class="linear-1"></td>
                    <td class="">
                        <details>
                        <summary>INGREDIENTES</summary>
                        <p class="text-center mr-12 border border-blue-800 bg-slate-900 p-2 rounded">{{$products->description}}</p>
                        </details>
                        <hr class="linear">
                    </td>
                    <td class="">{{$products->price}}</td>
                    <td class="p-2">
                    
                    </td>
                    <td>
                    
                    </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
         </div>
         @vite('resources/js/app.js')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    </body>
</x-app-layout>
  

  


