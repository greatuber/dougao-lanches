<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- ... (códigos anteriores) -->
</head>
<body>
  <div class="container mx-auto pt-2">
    <div class="text-center mb-2">
        <h1 class="p-2 pt-2 font-bold">LISTAGEM DE PEDIDOS ENTREGUES </h1>
       
        <div class="overflow-auto">
            @include('layouts.statusNavegation')
        </div>
      
      
            <div class="card p-2 pt-2 ">
            @forelse ($order as $item)
    
                <div class="card-header">
                    Pedido N- {{ $item->id }}
                </div>
                        @php
                
                            $user = $item->user_id
                
                        @endphp
            
                        @php
                            // $userOrderCount = $userCount->firstWhere('id', $users)->UserOrder_count;
                            $userCount = $item->where('user_id', $user)->count();
                        @endphp
                <div class="card-body">
                    <div class=" text-start">
                        {{-- Seu conteúdo do pedido aqui --}}
                        <p>Nome do Cliente: {{ $item->orderUser->name }}</p>
                        <p>Quantidade de Pedidos na Plataforma: {{ $userCount }}</p>
                        <p>Data: {{ $item->created_at->format('d/m/Y H:i') }}</p>
                        <p>Total: @money($item->total)</p>
                        <p>Entrega: {{ $item->delivery ? 'Sim' : 'Não' }}</p>
                        <p>Forma de pagamento: {{ $item->payment ? 'Dinheiro' : 'Cartão' }}</p>
                        <p>Observação: {{ $item->observation ?? 'Nenhuma observação' }}</p>
                        {{-- Adicione outras informações conforme necessário --}}
                    </div>
                       <div class="overflow-auto">
                        <table class="table table-hover mt-3" style="max-height: 300px; overflow-y: auto;">
                            <thead>
                                <tr>
                                    <th>Produto</th>
                                    <th>Quantidade</th>
                                    <th>Preço</th>
                                    <th>Observação</th>
                                    <th>Adicionais</th>
                                    <th>Brindes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($item->orderList as $list)
                                    <tr class="overflow-auto">
                                        <td>{{ $list->product->name ?? '' }}</td>
                                        <td>{{ $list->quamtity }}</td>
                                        <td>@money($list->value)</td>
                                        <td>{{ $list->observation ?? 'Nenhuma observação' }}</td>
                                        <td>
                                            @if ($list->orderAdditional->count() > 0)
                                                @foreach ($list->orderAdditional as $additional)
                                                    {{ $additional->name ?? '' }},
                                                @endforeach 
                                            @else
                                                Nenhum adicional
                                            @endif
                                        </td>
                                        <td > 
                                            @if($list->blindCart)
                                                {{ $list->blindCart->name}}
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

                       </div>
                       
                    <div class="container pt-4 pb-4">
                        <h1 class="font-bold">ENDEREÇO PARA ENTREGA</h1>
                        <div class="flex flex-wrap content-start pb-4">
                            <div class="p-2 text-start">
                                <label for="">Cidade:</label>
                                <span class="p-2 mr-2 font-bold">{{ $item->orderUser->address->last()->city ?? '' }}</span>
                            </div>
                            <div class="p-2 text-start">
                                <label for="">Rua:</label>
                                <span class="p-2 mr-2 font-bold">{{ $item->orderUser->address->last()->street ?? '' }}</span>
                            </div>
                            <div class="p-2 text-start">
                                <label for="">Bairro:</label>
                                <span class="p-2 mr-2 font-bold">{{ $item->orderUser->address->last()->district ?? '' }}</span>
                            </div>
                            <div class="p-2 text-start">
                                <label for="">Numero:</label>
                                <span class="p-2 mr-2 font-bold">{{ $item->orderUser->address->last()->number ?? '' }}</span>
                            </div>
                            <div class="p-2 text-start">
                                <label for="">Fone:</label>
                                <span class="p-2 mr-2 font-bold">{{ $item->orderUser->address->last()->fone ?? '' }}</span>
                            </div>
                            <div class="p-2 text-start">
                                <label for="">Complemento:</label>
                                <span class="p-2 mr-2 font-bold">{{ $item->orderUser->address->last()->complement ?? '' }}</span>
                            </div>
                        </div>
                    </div>
                
             
            
            </div>
        
        @empty
            <p class="pt-4 font-bold text-lg">Sem Pedidos com status entregues!</p>
            <p>Para o dia: @datetime(now())</p>
        @endforelse
    </div>
  </div>
</body>
</html>
