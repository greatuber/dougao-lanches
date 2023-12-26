<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script src="https://kit.fontawesome.com/03e947ed86.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>centerCart</title>
    @vite('resources/css/app.css')
    <style>
        .row{
          
           background-color: black;
        }
     
     
        .payment{
            align-items: center;
            justify-content: space-evenly;
        }
  
    </style>
</head>
<body>
        <div class="container mx-auto">
            <div class="text-center">
                <h1 class="p-4">LISTAGEM DE PEDIDOS ACEITOS</h1>
                
                <div class="">
                    @include('layouts.statusNavegation')
                </div>

                @forelse ($order as $item)
                
                    <form action="{{ route('pdf.imprimird',$item)}}" method="POST">
                    
                        @csrf 
                            <div class="pt-2 container overflow-auto">
                                <div class="border p-2 flex payment">
                                    <h1 class="font-bold  p-2">forma de pagamento</h1>
                                    
                                    <p>{{ $item->payment ? 'DINHEIRO' : 'CARTÃO' }} : </p>
                                
                                    <p class=" p-2">{{ $order[0]->observation}}</p>
                                </div>
                            </div>

                        <div class="card p-2">
                            <div class="overflow-auto">
                                <table class="table-auto w-full">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-2">Cliente</th>
                                            <th class="px-4 py-2">Número</th>
                                            <th class="px-4 py-2">Data </th>
                                            <th class="px-4 py-2">Total </th>
                                            <th class="px-4 py-2">Entrega</th>
                                            <th class="px-4 py-2">ESTATUS</th>
                                        </tr>
                                        </thead>
                                            <!-- Loop através dos pedidos -->
                                        <tbody>
                                            <tr>
                                                <td class="border px-4 py-2 order rounded">{{ $item->orderUser->name }}</td>
                                                <td class="border px-4 py-2 order rounded">{{ $item->id }}</td>
                                                <td class="border px-4 py-2 order rounded">{{ $item->created_at->format('d/m/Y H:i')}}</td>
                                                <td class="border px-4 py-2 order rounded">@money( $item->total)</td>
                                                <td class="border px-4 py-2 order rounded">{{ $item->delivery ? 'Sim' : 'Não' }}</td>
                                                <td class="border px-4 py-2 order rounded">{{ $item->status}}</td>
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
                                        
                                    </tr>
                                </thead>
                                <tbody class="pb-2">
                                    
                                    @foreach ($item->orderList as $list) 

                                            <tr>
                                                <td class="py-2 px-4 border-b">{{ $list->product->name ?? ''}}</td>
                                                <td class="py-2 px-4 border-b text-center">{{ $list->quamtity}}</td>
                                                <td class="py-2 px-4 border-b">{{ number_format($list->value, 2, ',', '.')  }}</td>
                                                <td class="py-2 px-4 border-b">{{ $list->observation ?? '' }}</td>
                                                <td class="py-2 px-4 border-b">
                                                
                                                    @if($list->oderAdditional()->count()>0)
                                                    
                                                        @foreach ($list->oderAdditional as $additional)
                                                        {{ $additional->name ?? '' }},
                                                        @endforeach  
                                            
                                                    @endif
                                            
                                                </td>
                                            </tr>
                                    @endforeach 
                                </tbody>
                            </table>    
                        </div>    

                        <div class=" container pt-4 pb-4">
                            <h1 class="font-bold">ENDEREÇO PARA ENTREGA</h1>
                          
                            
                            <div class="flex flex-wrap content-start pb-4">
                         
                                <div class="p-2 text-start">
                                    <label for="">Rua:</label>
                                    <span class="p-2 mr-2 font-bold">{{$item->orderUser->address[0]->street ?? ''}}</span>
                                </div>
                                <div class="p-2 text-start">
                                    <label for="">Bairro:</label>
                                    <span class="p-2 mr-2 font-bold">{{$item->orderUser->address[0]->district ?? ''}}</span>
                                </div>
                                <div class="p-2 text-start">
                                    <label for="">Numero:</label>
                                    <span class="p-2 mr-2 font-bold">{{$item->orderUser->address[0]->number ?? ''}}</span>
                                </div>
                                <div class="p-2 text-start">
                                    <label for="">Fone:</label>
                                    <span class="p-2 mr-2 font-bold">{{$item->orderUser->address[0]->fone ?? ''}}</span>
                                </div>
                                <div class="p-2 text-start">
                                    <label for="">Complemento:</label>
                                  
                                    <span class="p-2 mr-2 font-bold">{{$item->orderUser->address[0]->complement	 ?? ''}}</span>
                                </div>
                            </div>
                             
                        
                                <div class=" flex pb-2">

                                <div class="">

                    </form>
                    <form action="{{ route('pdf.index',$item->id)}}" method="GET">
                        @csrf
                        <button type="submit" class="border rounded p-2 button hover:text-blue-800 mr-2"> PREPARAR P/ IMPRIMIR</button>
                    </form>
            </div>
                <div class="">
                    <form action="{{route('status.product',$item->id)}}" method="POST">
                        @csrf
                            <button type="submit" class="border rounded p-2 button hover:text-blue-800">IR PARA PRODUÇÃO</button>
                    </form>
                </div>
        </div>
                 
              
                 <div class="row pb-2">
                    <hr>
                 </div>
            @empty
              <p class="pt-4 font-bold text-lg">Sem Pedidos com estatus aceito no momento!</p>
              <p>Para o dia: @datetime(now())</p>
           @endforelse
          
    
</body>
</html>
 