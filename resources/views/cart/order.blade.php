<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/03e947ed86.js" crossorigin="anonymous"></script>
    <script src="{{asset('js/index-cart.js')}}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>OrderCart</title>

     <style>
        .card-body .delivery {
            background-color: rgb(209, 216, 223);
            color: green;
            transition: 05ms ease-in-out;
                }
        .card-body .delivery:hover {
            background-color: blue;
            color: white;
            }
        .card-body .deliveryd {
            background-color: rgb(209, 216, 223);
            color: red;
            }
        .card-body .deliveryd:hover {
            background-color: blue;
            color: white;
            }
     </style>

</head>
<body>
    @vite('resources/css/app.css')
  <div class="container mx-auto pt-2">
    <div class="text-center mb-2">
        <h1 class="p-2 pt-2 font-bold">LISTAGEM DE PEDIDOS</h1>

        <div class="overflow-auto">
            @include('layouts.statusNavegation')
        </div>


            <div class="card p-2 pt-2 ">
            @forelse ($orders as $item)
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
                        <p class="text-card">Nome do Cliente: {{ $item->orderUser->name }}</p>
                        <p class="text-card">Quantidade de Pedidos na Plataforma: {{ $userCount }}</p>
                        <p class="text-card">Data: {{ $item->created_at->format('d/m/Y H:i') }}</p>
                        <p class="font-bold">Total: @money($item->total)</p>
                        <p class="text-card">Entrega: {{ $item->delivery ? 'Não' : 'Sim' }}</p>
                        <p class="text-card">Forma de pagamento: {{ $item->payment ? 'Dinheiro' : 'Cartão' }}</p>
                        <p class="text-card">Observação: {{ $item->observation ?? '//' }}</p>
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
                                        <td>{{ $list->observation ?? '//' }}</td>
                                        <td>
                                            @if ($list->orderAdditional->count() > 0)
                                                @foreach ($list->orderAdditional as $additional)
                                                    {{ $additional->name ?? '' }},
                                                @endforeach
                                            @else
                                                <p>//</p>
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
                    <div class=" flex p-2">

                        <form action="{{ route('update.status', ['id' => $item->id]) }}" method="POST">


                            @csrf
                                <div class="mr-2">
                                    <button class=" delivery border rounded p-2 button ">ACEITAR PEDIDO</button>
                                </div>
                        </form>
                        <div class="">

                            <form action="{{route('refused.status', $item->id)}}" method="post">
                                @csrf
                                <button class=" deliveryd border rounded p-2 button hover:text-blue-800">RECUSAR PEDIDO</button>
                            </form>
                        </div>
                    </div>
            </div>

        @empty
            <p class="pt-4 font-bold text-lg">Sem Pedidos com status processando no momento!</p>
            <p>Para o dia: {{ $date }}</p>
        @endforelse
    </div>
  </div>
  @vite('resources/js/app.js')
</body>
</html>
