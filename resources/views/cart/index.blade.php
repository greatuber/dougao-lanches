<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/03e947ed86.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>centerCart</title>
    <style>
      .button {
        margin-left: 10px;
        background-color:  #696969;
        font-size: 15px;
      }
      .container {
        font-family: 'Chela One', cursive;
        font-family: 'Roboto', sans-serif;
      }
      .gray {
        background-color: #696969;
      }
     .green {
  
      color: green;
     }

   
    </style>
    @vite('resources/css/app.css')
</head>
<body>
      <div class=" bg-orange-500 text-center md: p-2">
              <div class="text-center pt-4">
                    <h1 class="text-3xl text-gray-700 font-bold">Bem vindo a sua Sacola de Compras:</h1>
                    <p class="text-gray-700 font-bold">{{ auth()->user()->name }}</p>
                  </div>
                      @if (session('sucessesmessagem'))

                          <div class="text-green-600 text-lg p-2 font-bold">
                             {{ session('sucessesmessagem')}}
                          </div>
                          
                      @endif

                       @if (session('empaty'))
                       
                       <div class="text-red-500">
                        {{ session('empaty')}}
                       </div>

                      @endif 

                      @if (session('menssagem'))
                         <div class="text-red-500 bg-white p-2">
                          {{ session('menssagem')}}
                         </div>

                      @endif
                    <div class=" block  overflow-auto">
                      <table class=" sm:w-full text-md font-light ">
                          <thead class="border-b ">
                            <tr>
                                <th scope="col" class="px-4 py-2 text-gray-700">Produto</th>
                                <th scope="col" class="px-4 py-2 text-gray-700">Preço</th>
                                <th scope="col" class="px-4 py-2 text-gray-700">Quantidade</th>
                                <th scope="col" class="px-4 py-2 text-gray-700">OBSERVAÇÃO</th>
                                <th scope="col" class="px-4 py-2 text-gray-700">ADICIONAIS</th>
                            </tr>
                          </thead>
                        
                          @forelse ($cart as $item)
                              <?php $total = $total?>
                          <tbody>
                                  <tr class="border-b dark:border-neutral-500">
                                    <td class="whitespace-nowrap px-2 py-4 text-gray-700 font-bold">{{ $item->orderProductProduct->name }}</td>
                                      <input type="hidden"  name="product_id" value="{{ $item->orderProductProduct->name }}">
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <span class="gray text-white p-1 rounded">
                                         
                                            @money($item->orderProductProduct->price)

                                        </span>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">

                                        <span class="border text-white rounded p-2 gray">{{ $item->quanty }}</span>
                                        
                                    </td>
                                     
                                    <td class="text-gray-700 font-bold">
                                      {{ $item->observation ?? ''}}
                                    </td>
                                              
                                    <td class="text-gray-700 font-bold">
                                  
                                        @if($item->orderProductAdditional()->count()>0)
                                            @foreach ($item->orderProductAdditional as $additional)
                                              {{ $additional->name ?? '' }},
                                            @endforeach  
                                        @else
                                          Sem adicionais
                                        @endif
                                    </td>
                                    <td>
                            
                                      <form action="{{ route('cart.delete', $item->id) }}" method="POST">
                                        @csrf
                                        <div class="button border rounded">
                                            <button class="rounded text-red-500 p-2 ml-60 font-bold">EXCLUIR</button>
                                        </div>
                                    </form>
                                    </td>
                                </tr>
                    
                        @empty
                        <p class="text-white text-lg p-2 font-bold">'Sua sacola esta vazia'</p>
                    @endforelse
                          </tbody>
                      </table>
                    </div>

                            <div class="sm:w-96 sm:ml[width:150px]">
                                  <div class="bg-white rounded border pt-2 mt-2">
                                  <h1 class="font-bold text-gray-700 pt-2 pb-2">TOTAL</h1>
                <form action="{{route('admin.create')}}"  method="post">
                        @csrf
                                  <samp  class=" font-bold "  id="toremove"> R$ @money($total)</samp>
                                  <input type="hidden" name="total" value=" @money($total)">
                                  <samp  class=" font-bold" id="delivery"></samp>
                                </div>
                            </div>
                                 
                    <div class=" pb-2 mt-2">
                             <div class="text-center">
                                <h1 class="text-gray-700 font-bold pb-2 text-lg">o pagamento sera realizado na entrega</h1>
                             </div>
                            <div class="p-4 relative">
                                  <div class="pb-4">

                                      <input class="toremove" type="radio" checked value="0" id="toRemove" name="delivery" onchange="atualizarValor()" > 
                                      <label for=""  class="text-gray-700 font-bold pr-4" >Retirar na lanchonete</label>
                                      <input  class="delivery" type="radio" value="1" id="entrega" name="delivery" onchange="atualizarValor()"> 
                                      <label for="" class="text-gray-700 font-bold" >para Entregar</label>
                                      <i class="fa-solid fa-motorcycle text-white"></i>
                                      
                                  </div>
                            </div>

                            <div class="pb-4">
                                  <h2 class="text-gray-700 font-bold pb-2">forma de pagamento</h2>
                                  <input class="payment_card" type="radio" checked value="0" id="" name="payment" > 
                                  <label for=""  class="text-gray-700 font-bold pr-4" >cartão</label>
                                  <select name="credit_card" id="select" class="rounded mr-2" >
                                    <option  value="visa">Visa</option>
                                    <option  value="Master Card">Master Card</option>
                                    <option  value="Ouro Card">Ouro Card</option>
                                  </select>
                                
                                  <input  class="" type="radio" value="1"  name="payment"> 
                                  <label for="" class="text-gray-700 font-bold" >dinheiro</label>
                                    @error('payment')
                                         <div class="bg-black p-2">
                                           <samp>{{ $message}}</samp>
                                         </div>
                                    @enderror
                          </div>
                          <div class="pl-4 grid-templates-rows">
                                <input type="text" class="rounded text-sm" name="observation" id="observation" placeholder="ex: troco para 50 reais">
                          </div>
                          
                            <div class="">
                              <button type="submit" class="green bg-white font-bold p-2 mt-2 rounded order">Enviar Pedido</button>
                            </div>
                    </div>
                </form>       
                
                <div class="p-2 text-center">
                    <a href="{{ route('client.show')}}"><button class="text-sm border bg-white font-bold rounded p-2">CONTINUAR COMPRANDO</button></a>
                </div>
              <div class="">
                        <div class="text-center text-3xl">
                          <p class="font-bold text-gray-700 text-md pb-8 pt-2">Cadastre um endereço para entrega</p>
                        </div>
                        @if(session('success'))
                          <div class=" text-center  bg-white text-green-600 p-4 text-2xl rounded font-bold">
                              <p>{{ session('success')}}</p>
                          </div>
                        @endif
                    
                  <form action="{{ route('adress.create')}}" method="POST">
                    @csrf
                        <div class="mb-4 ">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="Produto">CIDADE</label>
                                    <input autocomplete="off" value="{{ $address->city ?? ''}}" class="shadow appearance-none border rounded sm:w-full py-2 px-3 text-gray-700  leading-tight focus:outline-none focus:shadow-outline" id="city" type="text" placeholder="digite a cidade" name="city">
                                      @error('city')
                                      <div class="bg-black p-2 ">
                                        <span class="error text-white ">{{ $message }}</span>
                                      </div>
                                      @enderror
                                  </div>
                                  <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="Produto">Bairro</label>
                                    <input autocomplete="off" value=" {{ $address->district ?? ''}}"  class="shadow appearance-none border rounded  sm:w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="bairro" type="text" placeholder="digite o Bairro" name="district">
                                      @error('district')
                                        <div class="bg-black p-2">
                                          <span class="error text-white">{{ $message }}</span>
                                        </div>
                                      @enderror
                                  </div>
                                  <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="Produto">Rua</label>
                                    <input autocomplete="off" value=" {{ $address->street ?? ''}}" class="shadow appearance-none border rounded sm:w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="street" type="text" placeholder="digite sua Rua" name="street">
                                      @error('street')
                                        <div class="bg-black p-2">
                                          <span class="error text-white">{{ $message }}</span>
                                        </div>
                                      @enderror
                                  </div>
                                  <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="Produto">Número</label>
                                    <input autocomplete="off" value=" {{ $address->number ?? ''}}" class="shadow appearance-none border rounded sm:w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="number"  placeholder="digite seu numero" name="number">
                                      @error('number')
                                        <div class="bg-black p-2">
                                          <span class="error text-white">{{ $message }}</span>
                                        </div>
                                      @enderror
                                  </div>
                                  <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="Produto">CEP</label>
                                    <input autocomplete="off" value=" {{ $address->zipcode ?? ''}}"  class="shadow appearance-none border rounded sm:w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="street"  placeholder="digite seu cep" name="zipcode">
                                      @error('zipcode')
                                        <div class="bg-black p-2">
                                          <span class="error text-white">{{ $message }}</span>
                                        </div>
                                      @enderror
                                  </div>
                                  <div class="mb-4 ">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="Produto">Complemento</label>
                                    <input autocomplete="off" value=" {{ $address->complement ?? ''}}" class="shadow  appearance-none border rounded sm:w-full py-3 px-3 pb-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="complement" type="text" placeholder="digite um complemento" name="complement">
                                      @error('complement')
                                        <div class="bg-black p-2">
                                          <span class="error text-white">{{ $message }}</span>
                                        </div>
                                      @enderror
                                  </div>
                        <div class="pb-4 ">
                          <button class="border p-2 rounded text-gray-700 bg-white  font-bold hover:orange-500">CADASTRAR</button>
                        </div>
                  </form>
              </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script>
      function atualizarValor() {
              const opcoes = document.getElementsByName('delivery');
              var toremove = document.getElementById('toremove');
              var delivery = document.getElementById('delivery');
              let total = "<?php echo $total; ?>";
              const taxa = 6.00;
              let totalAmount = 0;
          
          for (let i = 0; i <opcoes.length; i++) {
              if (opcoes[i].checked) {
                
                  if (opcoes[i].value === '0') {
                    
                      delivery.style.display = 'none';
                      toremove.style.display = 'block';
                    
                  } else if (opcoes[i].value === '1') {

                    toremove.style.display = 'none';
                    delivery.style.display = 'block';
                    totalAmount = parseFloat(total) + parseFloat(taxa);
                    
                  }
              }
                    totalAmount = totalAmount.toFixed(2);
                    totalAmount = totalAmount.replace(".",",");
                    delivery.innerHTML = 'R$' + "_" + totalAmount;
          }
      }
  
   
     
  

    </script>
</body>
</html>
 