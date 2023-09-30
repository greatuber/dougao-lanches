
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
            background-color: rgba(184, 177, 177, 0.897);
        }
        .button {
            background-color: rgba(184, 177, 177, 0.897);
        }
    </style>
</head>
<body>
  <div class="container mx-auto">
    <div class="text-center">
        <h1 class="p-4">LISTAGEM DE PEDIDOS QUE SAIRAM PARA ENTREGA</h1>

          <div class="">
            @include('layouts.statusNavegation')
          </div>
            
         @forelse ($order as $item)
            <div class="card p-2">
                <div class="overflow-auto">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Cliente</th>
                                <th class="px-4 py-2">Número</th>
                                <th class="px-4 py-2">Data </th>
                                <th class="px-4 py-2">Total </th>
                                <th class="px-4 py-2">Entrega</th></tr>
                            </thead>
                            <tbody><!-- Loop através dos pedidos -->
                                <tr>
                                    <td class="border px-4 py-2 order rounded">{{ $item->orderUser->name }}</td>
                                    <td class="border px-4 py-2 order rounded">{{ $item->id }}</td>
                                    <td class="border px-4 py-2 order rounded">{{ $item->created_at->format('d/m/y')}}</td>
                                    <td class="border px-4 py-2 order rounded">{{number_format( $item->total,2, ',', '.')}}</td>
                                    <td class="border px-4 py-2 order rounded">{{ $item->delivery ? 'Sim' : 'Não' }}</td>
                                </tr>
                            </tbody>
                    </table>
                </div>  
            </div>
            <div class=" overflow-auto">
                <table class="w-full border border-gray-100 ">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="py-2 px-4 border-b">Produto</th>
                            <th class="py-2 px-4 border-b">QUANTIDADE</th>
                            <th class="py-2 px-4 border-b">PREÇO</th>
                            <th class="py-2 px-4 border-b">OBSERVAÇÃO</th>
                            <th class="py-2 px-4 border-b">ADICIONAIS</th>
                            <th class="py-2 px-4 border-b">ESTATUS</th>
                        </tr>
                    </thead>
                    <tbody class="pb-2">
                      
                      @foreach ($item->orderList as $list)            
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $list->product->name ?? ''}}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $list->quamtity}}</td>
                            <td class="py-2 px-4 border-b">{{ number_format($list->value, 2, ',', '.')  }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->observation ?? '' }}</td>
                            <td class="py-2 px-4 border-b">{{ $list->product->additonal}}</td>
                            <td class="py-2 px-4 border-b">{{ $item->status }}</td>
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
                     <form action="{{route('status.fordelivered',$item->id)}}" method="POST">
                        @csrf
                        <div class="float-rigth">
                           
                            <button class="border rounded p-2 button hover:text-blue-800">ENTREGUE</button>
                        </div>
                     </form>
                 </div>
               
                 <div class="row pb-2">
                    <hr>
                 </div>
            @empty
              <p class="pt-4 font-bold text-lg">Sem Pedidos com estatus saiu para entrega no momento!</p>
              {{-- <p>Para o dia: {{$date}}</p> --}}
           @endforelse
    </div>
</body>
</html>
 