
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

            <details>
                <summary>Mostrar pedidos</summary>
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
                                          {{$item->product->name ?? ''}},
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
                    <p class="p-2 text-lg">Total em dinheiro: $ @money($totalCash) </p>
                    <p class="p-2 text-lg">Total em cartão: $ {{$totalCard}}</p>
                    <p class="p-2 text-lg text-green-600">Total: $ {{$total}}</p>
                </div>
            </div>
                <div class="container mt-4 mb-4">
                    <canvas id="myChart" width="300" height="200"></canvas>
                </div>
        </div>
         <div class="">

            <form action="{{route('summary.search')}}" method="POST">
                 @csrf
                <label for="" class="pb-2">Pesquisar detalhes do pedido pelo numéro</label><br>
                <input type="search" class="border mb-2 rounded" required autocomplete="off" name="search" placeholder="digite o numero do pedido">
                <button type="submit" class="border text-white p-2 bg-blue-500 hover:bg-blue-700 rounded">Pesquisar</button>
            </form>
         
         </div>
        <a href="{{ route('panel.admin')}}">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Voltar
            </button>
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Dinheiro', 'Cartão', 'Total'],
                datasets: [{
                    label: 'Gráfico de Vendas',
                    data: [{{$totalCash}}, {{$totalCard}}, {{$total}}],
                    backgroundColor: [
                        'rgba(255,255,0)',
                        'rgb(47,79,79)',
                        'rgba(0,255, 0, 0.6)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(235, 90, 132, 0)'

                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(235, 90, 132, 0)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>

<!-- Adicione no final da sua view, antes do fechamento do body -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('myCharts').getContext('2d');
        var salesData = $salesData;

        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: salesData.dates,
                datasets: [{
                    label: 'Total de Vendas',
                    data: salesData.totals,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // Cor de fundo
                    borderColor: 'rgba(75, 192, 192, 1)', // Cor da linha
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        type: 'linear',
                        position: 'bottom'
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>


</body>
</html>
 