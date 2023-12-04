<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>button</title>
</head>
<style>
      .lime {
            color: green;
           }
</style>
<body>
              <form action="{{ route('toggle.open')}}" method="POST">
                  @csrf
                    @can('access')
                        <button type="submit" class="bg-white text-black p-2 rounded mt-2 ml-2"
                            @if ($toggle->is_open == 0) inertex @endif >
                            @if ($toggle->is_open == 0)
                              <div class="text-red-500">
                                  abrir lanchonete
                              </div>
                            @else
                               <div class="lime">
                                  fechar lanchonete
                               </div>
                            @endif
                        </button>
                    @endcan
                </form>
</body>
</html>