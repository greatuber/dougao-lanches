<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>button</title>
</head>
<style>
     
           .custom-border {
        border: 2px solid #28a745; 
        border-radius: 10px; 
        box-shadow: 0 0 10px rgba(40, 167, 69, 0.5); 
        transition: border-color 0.3s ease-in-out; 
        }

        .custom-border:hover {
            background-color: #57cf71; 
            color: white;
            border: 2px solid white;
        }
</style>
<body>
              <form action="{{ route('toggle.open')}}" method="POST">
                  @csrf
                    @can('access')
                        <button type="submit" class="bg-orange-300 text-gray-700  custom-border text-sm p-2 rounded mt-2 ml-2"
                            @if ($toggle->is_open == 0) inertex @endif >
                            @if ($toggle->is_open == 0)
                              <div class="text-red-500">
                                  abrir lanchonete
                              </div>
                            @else
                               <div class="">
                                  fechar lanchonete
                               </div>
                            @endif
                        </button>
                    @endcan
                </form>
</body>
</html>