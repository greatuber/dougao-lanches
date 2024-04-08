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
  <div class="container mx-auto pt-2 ">
     <div class="text-center">


            <div class="container mx-auto pt-2">
                <div class="text-center">
                    <h1 class="font-bold pt-2">Resumo das vendas no mês de {{$dateMonth}}</h1>
                </div>


            </div>

     </div>

     <canvas id="salesChart" width="800" height="400"></canvas>

     <a href="{{ route('panel.admin')}}">
        <button class="bg-blue-500 hover:bg-blue-700  font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            Voltar
        </button>
    </a>

     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

     <script>
        document.addEventListener('DOMContentLoaded', function() {
            const salesChart = new Chart(document.getElementById('salesChart').getContext('2d'), {
                type: 'bar',
                data: {
                    labels: [{{ $dataDete }}],
                    datasets: [{
                        label: '{{ $dataLabel }}',
                        data: [{{ $dataTotal }}],
                        backgroundColor: 'rgba(0,0,205)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        x: {
                            type: 'category',
                        }
                    }
                }
            });
        });
    </script>



</body>
</html>
