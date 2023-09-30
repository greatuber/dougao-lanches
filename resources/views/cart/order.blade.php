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
        .row{
          
           background-color: black;
        }
        .order {
            background-color: rgba(212, 210, 210, 0.897);
        }
  
        .delivery {
            color: green;
        }
  
    </style>
</head>
<body>
  <div class="container mx-auto">
    <div class="text-center">
        <h1 class="p-2 pt-4">LISTAGEM DE PEDIDOS</h1>
        
              <div class="">
                @include('layouts.statusNavegation')
              </div>
        
         @forelse ($order as  $item)
            <div class="card p-2">
                <div class="overflow-auto">
                      @php
                          $user = $item->user_id
                        
                      @endphp

                      @php
                        // $userOrderCount = $userCount->firstWhere('id', $users)->UserOrder_count;
                        $userCount = $item->where('user_id', $user)->count();
                      @endphp
                       
                       <p>Cliente {{ $item->orderUser->name}} tem <span class="font-bold">'{{$userCount}}'</span> pedidos na plataforma.</p>
                    
                    <table class="table-auto w-full hover:text:blue-800">
                        <thead>
                                <th class="px-4 py-2 hover-text-blue-800">Cliente</th>
                                <th class="px-4 py-2 hover:text-blue-800">Número</th>
                                <th class="px-4 py-2 hover:text-blue-800">Data </th>
                                <th class="px-4 py-2 hover:text-blue-800">Total </th>
                                <th class="px-4 py-2 hover:text-blue-800">Entrega</th>
                                <th class="px-4 py-2 hover:text-blue-800">ESTATUS</th>
                        </thead>
                            <tbody>
                                <!-- Loop através dos pedidos -->
                                <tr>
                                    <td class="border px-4 py-2 order rounded">{{ $item->orderUser->name }}</td>
                                    <td class="border px-4 py-2 order rounded">{{ $item->id }}</td>
                                    <td class="border px-4 py-2 order rounded">@datetime( $item->created_at)</td>
                                    <td class="border px-4 py-2 order rounded">@money($item->total)</td>
                                    <td class="border px-4 py-2 order rounded">{{ $item->delivery ? 'Sim' : 'Não' }}</td>
                                    <td class="border px-4 py-2 order rounded">{{ $item->status }}</td>
                                </tr>
                            </tbody>
                    </table>
                </div>  
            </div>
            <div class=" overflow-auto text-sm">
                <table class="w-full border border-gray-100 ">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="py-2 px-4 border-b">Produto</th>
                            <th class="py-2 px-4 border-b">QUANTIDADE</th>
                            <th class="py-2 px-4 border-b">PREÇO</th>
                            <th class="py-2 px-4 border-b">OBSERVAÇÃO</th>
                            <th class="py-2 px-4 border-b">ADICIONAIS</th>
                            
                        </tr>
                    </thead>
                    <tbody class="pb-2">
                      @foreach ($item->orderList as $list)  
                        <tr>
                            <td class="py-2 px-2 max-w-full border-b">{{ $list->product->name ?? ''}}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $list->quamtity}}</td>
                            <td class="py-2 px-4 border-b">{{ number_format($list->value, 2, ',', '.')  }}</td>
                            <td class="py-2 px-4 border-b">{{ $list->observation ?? '' }}</td>
                            <td class="py-2 px-4 border-b">{{ $list->additional->name ?? ''}}</td>
                          
                        </tr>
                      @endforeach
                    </tbody>
                </table>    
            </div>    
                 <div class=" container pt-4 pb-4">
                    <h1 class="font-bold">ENDEREÇO PARA ENTREGA</h1>
                        <div class="flex flex-wrap content-start ">
                            <div class="p-2 text-start">
                                <label for="">Cidade:</label>
                                <input class="rounded border" type="text" value="{{$item->orderUser->address[0]->city ?? ''}}">
                            </div>
                            <div class="p-2 text-start">
                                <label for="">Rua:</label>
                                <input class="rounded border" type="text" value="{{$item->orderUser->address[0]->street ?? ''}}">
                            </div>
                            <div class="p-2 text-start">
                                <label for="">Bairro:</label>
                                <input class="rounded border" type="text" value="{{$item->orderUser->address[0]->district ?? ''}}">
                            </div>
                            <div class="p-2 text-start">
                                <label for="">Numero:</label>
                                <input class="rounded border" type="number" value="{{$item->orderUser->address[0]->number ?? ''}}">
                            </div>
                            <div class="p-2 text-start">
                                <label for="">Cep:</label>
                                <input class="rounded border" type="number" value="{{$item->orderUser->address[0]->zipcode ?? ''}}">
                            </div>
                            <div class="p-2 text-start">
                                <label for="">complemento:</label>
                                <input class="rounded border" type="text" value="{{$item->orderUser->address[0]->complement	 ?? ''}}">
                            </div>
                        </div>
                     <form action="{{route('update.status',$item->id)}}" method="POST">
                        @csrf
                        <div class="float-rigth">
                            <button class=" delivery border rounded p-2 button hover:text-blue-800">ACEITAR PEDIDO</button>
                        </div>
                     </form>
                 </div>
                 <div class="row pb-2">
                    <hr>
                 </div>
            @empty
              <p class="pt-4 font-bold text-lg">Sem Pedidos com status processando no momento!</p>
              <p>Para o dia: {{$date}}</p>
           @endforelse
    </div>
</body>
</html>
 