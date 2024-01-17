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
     
 
  
        .delivery {
            color: green;
        }
        .deliveryd {
            color: red;
        }
  
    </style>
</head>
<body>
  <div class="container mx-auto pt-2 ">
    <div class="text-center">
        <h1 class="pb-2">RESULTADO DO PEDIDO PEQUISADO</h1>

            <div class="card p-2 pt-2">
                <div class="overflow-auto w-full">
                      @php
                          $user = $order->user_id
                      @endphp

                      @php
                        $userCount = $order->where('user_id', $user)->count();
                      @endphp
                       
                    
                        <div class="pt-2 mt-2 flex border p-2 rounded w-full overflow-auto">
                              <div class="">

                                <div class="">
                                    <p> {{ $order->orderUser->name}} tem <span class="font-bold">'{{$userCount}}'</span> pedidos na plataforma.</p>
                                    {{-- <p>{{ $order->created_at->format('d/m/y H:i')}}</p> --}}
                                 </div>
   
                                 <div class=" rounded flex" >
                                    <p class=" p-2 tex-center">{{ $order->payment ? 'DINHEIRO' : 'CARTÃO' }}:</p>
                                    <p class=" p-2 text-center">{{ $order->observation}}</p>
                                 </div>
                              </div>
                        </div>
                    <table class="table-auto w-full hover:text:blue-800">
                        <thead>
                                <th class="px-4 py-2 hover:text-blue-800">Cliente</th>
                                <th class="px-4 py-2 hover:text-blue-800">Número</th>
                                <th class="px-4 py-2 hover:text-blue-800">Data </th>
                                <th class="px-4 py-2 hover:text-blue-800">Total </th>
                                <th class="px-4 py-2 hover:text-blue-800">Entrega</th>
                                <th class="px-4 py-2 hover:text-blue-800">ESTATUS</th>
                        </thead>
                            <tbody>
                                <!-- Loop através dos pedidos -->
                                <tr>
                                    <td class="border px-4 py-2 order rounded">{{ $order->orderUser->name }}</td>
                                    <td class="border px-4 py-2 order rounded">{{ $order->id }}</td>
                                    <td class="border px-4 py-2 order rounded">{{ $order->created_at->format('d/m/y H:i')}}</td>
                                    <td class="border px-4 py-2 order rounded">@money($order->total)</td>
                                    <td class="border px-4 py-2 order rounded">{{ $order->delivery ? 'Sim' : 'Não' }}</td>
                                    <td class="border px-4 py-2 order rounded">{{ $order->status }}</td>
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
                      @foreach ($order->orderList as $list)  
                    
                        <tr>
                            <td class="py-2 px-2 max-w-full border-b">{{ $list->product->name ?? ''}}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $list->quamtity}}</td>
                            <td class="py-2 px-4 border-b">@money($list->value)</td>
                            <td class="py-2 px-4 border-b">{{ $list->observation ?? '' }}</td>
                            <td class="py-2 px-4 border-b">
                           
                                @if($list->orderAdditional->count()>0)
                                    @foreach ($list->orderAdditional as $additional)
                                        {{ $additional->name ?? '' }},
                                    @endforeach 
                                @else

                                    <div class="">
                                        <p>//</p>
                                    </div>

                                @endif
                                
                            </td>
                          
                        </tr>
                      @endforeach

                 
                    </tbody>
                </table>  
                          
                <div class=" container pt-4 pb-4">
                    <h1 class="font-bold">ENDEREÇO DO CLIENTE</h1>
                      
                    <div class="flex flex-wrap content-start pb-4">
                        <div class="p-2 text-start">
                            <label for="">Cidade:</label>
                        
                            <span class=" p-2 mr-2 font-bold">{{$order->orderUser->address->last()->city  ?? ''}}</span>
                        </div>
                        <div class="p-2 text-start">
                            <label for="">Rua:</label>
                            <span class="p-2 mr-2 font-bold">{{$order->orderUser->address->last()->street ?? ''}}</span>
                        </div>
                        <div class="p-2 text-start">
                            <label for="">Bairro:</label>
                            <span class="p-2 mr-2 font-bold">{{$order->orderUser->address->last()->district ?? ''}}</span>
                        </div>
                        <div class="p-2 text-start">
                            <label for="">Numero:</label>
                            <span class="p-2 mr-2 font-bold">{{$order->orderUser->address->last()->number ?? ''}}</span>
                        </div>
                        <div class="p-2 text-start">
                            <label for="">Fone:</label>
                            <span class="p-2 mr-2 font-bold">{{$order->orderUser->address->last()->fone ?? ''}}</span>
                        </div>
                        <div class="p-2 text-start">
                            <label for="">Complemento:</label>
                        
                            <span class="p-2 mr-2 font-bold">{{$order->orderUser->address->last()->complement	 ?? ''}}</span>
                        </div>
                    </div>      

            </div>    
               
        </div>
              
                 <a href="{{ route('panel.admin')}}">
                    <button class="bg-blue-500 hover:bg-blue-700 mt-2 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Voltar
                    </button>
                </a>
    </div>
  

  
             
</body>
</html>
 