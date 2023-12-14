<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/03e947ed86.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
    
      .orange {
        width: 400px;
        border-radius: 8px;
       
      }
    .icon {
      font-size: 30px;
    color: white;
    margin-left: 15px;
    margin-top: 3px;
    }
   .green {
    background-color: rgb(21, 185, 21);
   }

  
    </style>

    <title>CreateProduct</title>
</head>
<body>
    @vite('resources/css/app.css')

    <div class="container pt-2 pb-2">
     
       <div class="text-center sm:ml-32 ml-32">
          <div class=" center">
                  <div class="">
                          <div class="  text-center pr-4 bg-orange-500 rounded">
                            <h1 class="text-center text-white font-bold  pt-2">SEJA BEM VINDO AO SEU PAINEL ADMINISTRATIVO</h1> <br>  
                                  <h2 class="font-bold text-lg"> {{Auth::user()->name}} </h2>
                                        <div class="text-center p-2 ">
                                          <h1>CATEGORIAS</h1>
                                        </div>
                                  <div class="container pl-2 pb-2">

                                      <a href="{{ route('showbeer')}}" class=""><div class=" hover:bg-blue-700  border text-white p-2 mt-2 ml-2 rounded font-bold">BEBIDAS</div></a>
                                      <a href="{{ route('showcombo')}}"><div class=" hover:bg-blue-700  border text-white p-2 rounded mt-2 ml-2 font-bold">COMBOS</div></a>
                                      <a href="{{ route('create.product')}}"><div class=" hover:bg-blue-700  border text-white p-2 rounded mt-2 ml-2 font-bold">LANCHES</div></a>
                                      <a href="{{ route('user.bomboniere')}}"><div class=" hover:bg-blue-700  border text-white p-2 rounded mt-2 ml-2 font-bold">BOMBONIÉRE</div></a>
                                      <a href="{{ route('order.show')}}"><div class=" hover:bg-blue-700  border text-white p-2 rounded mt-2 ml-2 font-bold">PEDIDOS</div></a>
                                          <div class="pt-2">
                                            <h1>CADASTRO E ATUALIZAÇOÊS DE PRODUTOS</h1>
                                          </div>
                                      <a href="{{ route('new.project')}}"><div class=" hover:bg-blue-700  border text-white p-2 rounded mt-2 ml-2 font-bold">CADASTRAR NO PRODUTO</div></a>
                                      <a href="{{ route('view.category')}}"><div class=" hover:bg-blue-700  border text-white p-2 rounded mt-2 ml-2 font-bold">CADASTRAR NOVA CATEGORIA</div></a>
                                      <a href="{{ route('view.aditional')}}"><div class=" hover:bg-blue-700  border text-white p-2 rounded mt-2 ml-2 font-bold">CADASTRAR NOVO ADICIONAL</div></a>
                                      <a href="{{ route('client.show')}}"><div class=" hover:bg-blue-700  border text-white p-2 rounded mt-2 ml-2 font-bold mb-2">CLIENTES</div></a>
                                    
                                  </div>
                          </div>
                  </div>

             <p class="text-center text-gray-500 text-xs">
        
               &copy;2023 todos os direitos reservados desenvolvendor web Alexandre Roberto.
             </p>
         </div>
    </div>
    @vite('resources/js/app.js')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
 