
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
                    <h1 class="font-bold pt-2">GRÁFICO DE LANCHES MAIS VENDIDOS</h1>
                </div>
        
            
            </div>
               
     </div>
     
     <div style="width: 80%; margin: auto;">
        <canvas id="salesChart"></canvas>
    </div>

     <a href="{{ route('panel.admin')}}">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            Voltar
        </button>
    </a>
   
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
     
     <script>
        // Obtenha os dados do controlador
        var data = <?php echo json_encode($data); ?>;

        // Configure os dados para o Chart.js
        var labels = data.map(function(item) {
            return item.productName;
        });

        var quantities = data.map(function(item) {
            return item.quantity;
        });
        //   doughnut
        // Crie um gráfico de pizza
        var ctx = document.getElementById('salesChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: quantities,
                    backgroundColor: [
                        'rgba(0,0,128)',
                        'rgba(107,142,35)',
                        'rgba(79,79,79)',
                        'rgba(255,0,0)',
                        'rgba(255,255,0)',
                        'rgba(0,250,154)',
                        'rgba(255,222,173)',
                        'rgba(222,184,135)',
                        'rgba(123,104,238)',
                        'rgba(138,43,226)',
                        'rgba(139,0,139)',
                        'rgba(199,21,133)',
                    ],
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });
    </script>
    
             
</body>
</html>
 