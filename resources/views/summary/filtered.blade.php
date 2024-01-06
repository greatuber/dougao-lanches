
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

    <div class="text-center">
        <div class="container mx-auto pt-2">

            <div class="text-center pb-2">
                <h1 class="font-bold pt-2">RESUMO DE PEDIDOS FILTRADOS</h1>
            </div>
          @if(session('nfound'))
             {{session('nfound')}}
          @endif
         <details>
            <summary>Mostrar tabela</summary>
            <div class="mt-4 container text-center">
                <table class="min-w-full bg-white border border-gray-300 overflow-auto">
                    <thead>
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">Número do Pedido</th>
                            <th class="border border-gray-300 px-4 py-2">Data do Pedido</th>
                            <th class="border border-gray-300 px-4 py-2">Produto</th>
                            <th class="border border-gray-300 px-4 py-2">Valor</th>
                            <th class="border border-gray-300 px-4 py-2">Tipo de Pagamento</th>
                            <th class="border border-gray-300 px-4 py-2">Usuário</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td class="border border-gray-300  py-2">{{$order->id}}</td>
                            <td class="border border-gray-300 px-4 py-2">{{$order->created_at->format('d/m/y')}}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                @foreach ($order->orderList as $item)
                                {{$item->product->name}},
                                @endforeach
                                
                            </td>
                            <td class="border border-gray-300 px-4 py-2">${{$order->total}}</td>
                            <td class="border border-gray-300 px-4 py-2">{{$order->payment == '0' ? 'Cartão' : 'Dinheiro'}}</td>
                            <td class="border border-gray-300 px-4 py-2">{{$order->orderUser->name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
         </details>
            
            <div class="pb-2 container">
                <div class="text">
                    <p class="p-2 text-lg">Número de pedidos: {{$count}}</p>
                    <p class="p-2 text-lg">Total em dinheiro: $ {{$totalCash}} </p>
                    <p class="p-2 text-lg">Total em cartão: $ {{$totalCard}}</p>
                    <p class="p-2 text-lg text-green-600">Total: $ {{$total}}</p>
                </div>
            </div>
        </div>
         <div class="">
            <form action="{{route('summary.search')}}" method="POST">
                 @csrf
                <label for="">Pesquisar pedido</label>
                <input type="text" class="border mb-2" autocomplete="off" name="search" placeholder="digite o numero do pedido">
                <button type="submit" class="border p-2">Pesquisar</button>
            </form>
           
         </div>
        <a href="{{ route('panel.admin')}}">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Voltar
            </button>
        </a>
    </div>
</body>
</html>
 