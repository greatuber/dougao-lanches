<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/03e947ed86.js" crossorigin="anonymous"></script>
    <script src="{{asset('js/index-cart.js')}}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <title>centerCart</title>
    <style>
   
      .container {
        font-family: 'Chela One', cursive;
        font-family: 'Roboto', sans-serif;
      }
    
 
     
     /* .group{
      justify-content: space-evenly;
     } */
     .order {
      background-color: blue;
      
     }
     .yellow {
      color: yellow;
     }
     .blind {
      background-color: rgb(85, 240, 85);
    
     }
   
     input[type="radio"]:checked {
   
    background-color: #ff9800; 
    border-color: #ff9800;
    color: #ff9800; 
}
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
    
    {{-- <script>
    
      function limpa_formulário_cep() {
              //Limpa valores do formulário de cep.
              document.getElementById('rua').value=("");
              document.getElementById('bairro').value=("");
              document.getElementById('cidade').value=("");
              document.getElementById('numero').value=("");
              document.getElementById('complemento').value=("");
      }
    
      function meu_callback(conteudo) {
          if (!("erro" in conteudo)) {
              //Atualiza os campos com os valores.
              document.getElementById('rua').value=(conteudo.logradouro);
              document.getElementById('bairro').value=(conteudo.bairro);
              document.getElementById('cidade').value=(conteudo.localidade);
              // document.getElementById('numero').value=(conteudo.numero);
              // document.getElementById('complemento').value=(conteudo.complento);
          } //end if.
          else {
              //CEP não Encontrado.
              limpa_formulário_cep();
              alert("CEP não encontrado.");
          }
      }
          
      function pesquisacep(valor) {
    
          //Nova variável "cep" somente com dígitos.
          var cep = valor.replace(/\D/g, '');
    
          //Verifica se campo cep possui valor informado.
          if (cep != "") {
    
              //Expressão regular para validar o CEP.
              var validacep = /^[0-9]{8}$/;
    
              //Valida o formato do CEP.
              if(validacep.test(cep)) {
    
                  //Preenche os campos com "..." enquanto consulta webservice.
                  document.getElementById('rua').value="...";
                  document.getElementById('bairro').value="...";
                  document.getElementById('cidade').value="...";
                  // document.getElementById('numero').value="...";
                  // document.getElementById('complemento').value="...";
    
                  //Cria um elemento javascript.
                  var script = document.createElement('script');
    
                  //Sincroniza com o callback.
                  script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
    
                  //Insere script no documento e carrega o conteúdo.
                  document.body.appendChild(script);
    
              } //end if.
              else {
                  //cep é inválido.
                  limpa_formulário_cep();
                  alert("Formato de CEP inválido.");
              }
          } //end if.
          else {
              //cep sem valor, limpa formulário.
              limpa_formulário_cep();
          }
      };
    
    </script> --}}


    @vite('resources/css/app.css')
</head>
<body>
      <div class=" bg-orange-500 text-center md: p-2">
                   <div class="p-2 text-xl text-gray-700 font-bold">
                    <a href="{{route('index.point')}}"  class="cart ">
                      Cartão fidelidade
                      <i class="fa-solid fa-id-card fa-2xl" style="color: #20cc48"></i>
                    </a>
                   </div>
                <div class="text-center ">
                      
                      <h1 class="text-xl text-gray-700 font-bold">Bem vindo a sua Sacola de Compras:</h1>
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

                              @if ( session('total'))
                                 <div class="text-red-500 bg-white p-2">
                                  <p>
                                    {{session('total')}}
                                  </p>
                                 </div>
                              @endif

                    <div class=" block  overflow-auto">

                          <table class=" sm:w-full text-md font-light ">
                              <thead class="border-b ">
                                <tr>
                                    <th scope="col" class="px-4 py-2 text-gray-700">Produto</th>
                                    <th scope="col" class="px-4 py-2 text-gray-700">Preço</th>
                                    <th scope="col" class="px-4 py-2 text-gray-700">Quantidade</th>
                                    <th scope="col" class="px-4 py-2 text-gray-700">Observação</th>
                                    <th scope="col" class="px-4 py-2 text-gray-700">Adicionais</th>
                                    <th scope="col" class="px-4 py-2 text-gray-700">Blinde</th>
                                    <th scope="col" class="px-4 py-2 text-gray-700">Açoẽs</th>
                                  
                                </tr>
                              </thead>
                            
                                  @forelse ($cart as $item)
                                        <?php $total = $total?>
                                      <tbody>
                                              <tr class="border-b dark:border-neutral-500">
                                                <td class="whitespace-nowrap px-2 w-auto text-gray-700 font-bold">
                                                  
                                                   @if ($item->orderProductProduct)
                                                   <span class=" custom-border text-gray-700 rounded p-2 px-6 md:px-4 bg-orange-300 font-bold w-full text-sm ">{{ $item->orderProductProduct->name ?? ''}}</span>
                                                   @else
                                                       <div class="bg-orange-300 p-2 rounded custom-border ">
                                                        <p>
                                                          //
                                                        </p>
                                                       </div>
                                                   @endif
                                                 
                                                </td>

                                                  <input type="hidden"  name="product_id" value="{{ $item->orderProductProduct->name ?? ''}}">
                                              
                                                <td class="whitespace-nowrap px-6 py-4">
                                                   @if ( $item->orderProductProduct )
                                                    <span class=" custom-border  bg-orange-300 p-2 px-4 font-bold rounded  text-sm">
                                                      @money($item->orderProductProduct->price ?? 0)
                                                    </span>
                                                   @else
                                                       <div class="bg-orange-300 p-2 rounded custom-border ">
                                                        <p>
                                                          //
                                                        </p>
                                                       </div>
                                                   @endif

                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                  @if ( $item->quanty)
                                                  <span class="custom-border  rounded p-2 px-4 bg-orange-300 font-bold text-sm">{{ $item->quanty}}</span>
                                                  @else
                                                      <div class="bg-orange-300 p-2 rounded custom-border ">
                                                        <p>
                                                          //
                                                        </p>
                                                      </div>
                                                  @endif
 
                                                </td>
                                                
                                                <td class="text-gray-700  font-bold">
                                                    @if ( $item->observation)
                                                       <div class="">
                                                        <span class="custom-border  bg-orange-300 rounded p-2 px-4  font-bold text-sm">{{ $item->observation ?? ''}}</span>
                                                       </div>
                                                    
                                                    @else
                                                        <div class="">
                                                          <p class="bg-orange-300 p-2 rounded custom-border ">
                                                            //
                                                          </p>
                                                        </div>
                                                    @endif
                                                  
                                                  
                                                </td>
                                                          
                                                <td class="text-gray-700 font-bold">
                                              
                                                      @if ($item->orderProductAdditional()->count()>0)
                                                        @foreach ($item->orderProductAdditional as $additional)
                                                          <span class="custom-border  bg-orange-300 rounded p-2 px-4 font-bold text-sm">{{ $additional->name ?? '' }}</span><br>
                                                        @endforeach  
                                                      @else
                                                          <div class="bg-orange-300 p-2 rounded custom-border ">
                                                            <p>
                                                              //
                                                            </p>
                                                          </div>
                                                      @endif   
                                                    
                                                </td> 
                                                <td class="text-gray-700 font-bold"> 
                                                       
                                                       
                                                        @if ($item->blinCart)
                                                          <span class="custom-border  bg-orange-300 rounded p-2  px-6 text-sm">{{ $item->blinCart->name ?? ''}}</span>
                                                        @else
                                                            <div class="bg-orange-300 p-2 rounded custom-border ">
                                                              <p>
                                                                //
                                                              </p>
                                                            </div>
                                                        @endif
                                                      
                                                </td>
                                                <td>
                                        
                                                  <form action="{{ route('cart.delete', $item->id) }}" method="POST">
                                                    @csrf
                                                    <div class=" rounded">
                                                        <button class="rounded text-gray-700 p-2  font-bold text-sm bg-orange-300 custom-border ">EXCLUIR</button>
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
                    {{-- @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                        {{-- <div class="pt-2 text-center">
                          @if(count($blindCart) > 0)
                              <div class="row">
                                  @foreach($blindCart as $blindItem)
                                    @if($blindItem->status == 'pendente')
                                      <div class="col-md-8 mb-2">
                                          <div class="card text-center">
                                            <h2 class="card-title font-bold pt-2">Blinde solicitado</h2>
                                              <div class="card-body d-flex flex-row text-center">
                                                  <h5 class="card-title p-2">Cliente: {{ $blindItem->blindCartUser->name }}</h5>
                                                  <p class="card-text p-2">Blind: {{ $blindItem->name }}</p>
                                                  <p class="card-text p-2">Pontos: {{ $blindItem->points }}</p>
                                              </div>
                                          </div>
                                      </div>
                                    @endif  
                                  @endforeach
                              </div>
                          @endif
                      </div> --}}
                      
                    <div class="  container ">
                          <div class="rounded  pt-2 mt-2  ">
                               <div class="ml-4 mr-4  container">
                                  <h1 class="font-bold text-gray-700 pt-2 pb-2 ">TOTAL</h1>
                              
                              
                              @if(!empty($cart->blinCart) && count($cart->blinCart) > 0)
                                @foreach ($cart->blinCart as $item)
                                    
                        
                                    <form action="{{ route('admin.createBlind',$item->id) }}" method="post">
                                      
                                          @csrf
                                          <input type="hidden" name="blindCartId" value="{{ $item ?? ''}}">
                                         
                                         
                                          <samp  class=" font-bold bg-white p-2  rounded"  id="toremove"> R$ @money($total)</samp>
                                          <samp  class=" font-bold bg-white p-2  rounded"  id="delivery"></samp>
                                          <input type="hidden" name="total" value=" @money($total)">
                                </div>
                          </div>
                    </div>
                            
                            <div class=" pb-2 mt-2">
                                    <div class="text-center">
                                        <h1 class="text-gray-700 font-bold pb-2 text-lg">o pagamento será realizado na entrega</h1>
                                    </div>
                                    <div class="p-4 relative">
                                          <div class="pb-4 w-full">

                                              <input class="toremove" type="radio" checked value="0" id="toRemove" name="delivery" onchange="atualizarValor()" > 
                                              <label for="toRemove"  class="text-gray-700 font-bold pr-4" >Retirar na lanchonete</label>
                                              <input  class="delivery" type="radio" value="1" id="entrega" name="delivery" onchange="atualizarValor()"> 
                                              <label for="entrega" class="text-gray-700 font-bold" >Para entregar</label>
                                              <i class="fa-solid fa-motorcycle fa-xl text-blue-500"></i>

                                          </div>
                                    </div>

                                    <div class="pb-4">
                                          <h2 class="text-gray-700 font-bold pb-2">forma de pagamento</h2>
                                          <input class="payment_card" type="radio" checked value="0" id="" name="payment" > 
                                          <label for=""  class="text-gray-700 font-bold pr-4" >Cartão</label>
                                          <select name="credit_card" id="select" class="rounded mr-2" >
                                            <option  value="visa">Visa</option>     
                                            <option  value="Master Card">Master Card</option>
                                            <option  value="Ouro Card">Ouro Card</option>
                                          </select>
                                        
                                          <input  class="" type="radio" value="1"  name="payment"> 
                                          <label for="" class="text-gray-700 font-bold" >Dinheiro</label>
                                            @error('payment')
                                                <div class="bg-black p-2">
                                                  <samp>{{ $message}}</samp>
                                                </div>
                                            @enderror
                                  </div>
                                  <div class="pl-4 grid-templates-rows">
                                    
                                        <input type="text" class="rounded text-sm " name="observation" id="observation" placeholder="ex: troco para 50 reais">
                                  </div>
                            </div>
                                  
                        <div class="">
                                
                                  <button type="submit" class="font-bold text-sm text-white p-2 mb-2 bg-blue-500  border rounded">

                                    Enviar pedido

                                  </button>

                                      
                                    </form>    
                                  @endforeach         
                                 
                              @else   
                                <form action="{{ route('admin.create') }}" method="post">
                                  @csrf
                                                     
                                                        <samp  class=" font-bold bg-orange-300 p-2  rounded custom-border  mb-2"  id="toremove"> R$ @money($total)</samp>
                                                        <samp  class=" font-bold bg-orange-300 p-2  rounded custom-border  mb-2"  id="delivery"></samp>
                                                        <input type="hidden" name="total" value=" @money ($total)">
                                                     
                                                        @foreach ($cart as $item)
                                                          <input type="hidden" name="blindCartId" value="{{ $item->blinCart->id ?? ''}} ">
                                                        @endforeach
                                                       
                                                    </div>
                                                </div>
                        </div>
                                          
                                          <div class=" pb-2 mt-2">
                                                  <div class="text-center">
                                                      <h1 class="text-gray-700 font-bold pb-2 text-lg">o pagamento será realizado na entrega</h1>
                                                  </div>
                                                  <div class="p-4 relative">
                                                        <div class="pb-4 w-full">

                                                            <input class="toremove bg-orange-300 custom-border " type="radio" checked value="0" id="toRemove" name="delivery" onchange="atualizarValor()" > 
                                                            <label for="toRemove"  class="text-gray-700 font-bold pr-4" >Retirar na lanchonete</label>

                                                            <input  class="delivery bg-orange-300 custom-border " type="radio" value="1" id="entrega" name="delivery" onchange="atualizarValor()"> 
                                                            <label for="entrega" class="text-gray-700 font-bold" >Para entregar</label>
                                                            <i class="fa-solid fa-motorcycle fa-xl text-blue-500"></i>

                                                        </div>
                                                  </div>

                                                  <div class="pb-4">
                                                        <h2 class="text-gray-700 font-bold pb-2">forma de pagamento</h2>
                                                        <input class="payment_card bg-orange-300 custom-border " type="radio" checked value="0" id="" name="payment" > 
                                                        <label for=""  class="text-gray-700 font-bold pr-4" >Cartão</label>
                                                        <select name="credit_card" id="select" class="rounded mr-2 bg-orange-300 custom-border " >
                                                          <option  value="visa">Visa</option>     
                                                          <option  value="Master Card">Master Card</option>
                                                          <option  value="Ouro Card">Ouro Card</option>
                                                        </select>
                                                      
                                                        <input  class="bg-orange-300 custom-border " type="radio" value="1"  name="payment"> 
                                                        
                                                        <label for="" class="text-gray-700 font-bold " >Dinheiro</label>
                                                          @error('payment')
                                                              <div class="bg-black p-2">
                                                                <samp>{{ $message}}</samp>
                                                              </div>
                                                          @enderror
                                                </div>
                                                <div class="pl-4 ">
                                                  <label for="" class="pb-2 text-gray-700 font-bold">Se seu pagamento for em diheiro preencha este campo aqui em baixo</label><br>
                                                  <input type="text" class="rounded text-sm custom-border  bg-orange-300" name="observation" id="observation" placeholder="ex: troco para 50 reais">
                                                </div>
                                          </div>
                                                
                                      <div class="text-center  overflow-auto">
                                              
                                        <button type="submit" class=" text-md bg-orange-300 p-2 mb-2 custom-border  rounded">

                                          Enviar pedido
  
                                        </button>
                                            
                                </form> 
                              @endif  
                                   
                                        <div class="p-2 text-center">
                                          <a href="{{ route('client.show')}}"><button class="text-md bg-orange-300 custom-border   rounded p-2">Continuar comprando</button></a>
                                        </div>
                        
                                        <button class=" text-md p-2 bg-orange-300 custom-border  rounded mb-2 mt-2 " data-bs-toggle="modal"
                                            data-bs-target="#firstModal"> 
                                            Cadastrar um endereço para entrega
                                        </button>
                                    </div>
              <div class="">   
                            @if(session('success'))
                                <div class=" text-center  bg-white text-green-600 p-4  rounded font-bold">
                                    <p>{{ session('success')}}</p>
                                </div>
                            @endif             
                        <div class="text-center text-3xl">
                           
                                    <div class="modal fade" id="firstModal" tabindex="-1"
                                      aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                          <div class="modal-content">
                                              <div class="modal-header,btn btn-warning">
                                                  {{-- <h2 class="modal-title pt-4 ml-40" id="exampleModalLabel text-center">Adiciona este produto em seu carrinho</h2> --}}
                                                  <button type="button" class="btn-close " data-bs-dismiss="modal"   aria-label="Close">
                                                    X
                                                  </button>
                                              </div>
                                              <div class="modal-body">
                                                <form action="{{ route('adress.create')}}" method="POST">
                                                  @csrf  
                                                          <div class="container">
                                                              <div class="mb-4 sachadow-black">
                                                                <label class="block text-gray-700 text-sm font-bold mb-2" for="Produto">Cidade</label>
                                                                <input autocomplete="off" value="" class="shadow-balck appearance-none border rounded sm:w-full py-2 px-3 text-gray-700  leading-tight focus:outline-none focus:shadow-outline " id="city" type="text" placeholder="digite a cidade" name="city">
                                                                  @error('city')
                                                                  <div class=" p-2 ">
                                                                    <span class="error text-red-500">{{ $message }}</span>
                                                                  </div>
                                                                  @enderror
                                                              </div>
                                                              <div class="mb-4">
                                                                <label class="block text-gray-700 text-sm font-bold mb-2" for="Produto">CEP</label>
                                                                <input autocomplete="off" value=""  class="shadow text-sm appearance-none border rounded sm:w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="cep"  onblur="pesquisacep(this.value); placeholder= "digite seu cep" name="zipcode">
                                                              
                                                                @error('zipcode')
                                                                    <div class=" p-2">
                                                                        <span class="error text-red-500">{{ $message }}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                              
                              
                                                              <div class="mb-4">
                                                                <label class="block text-gray-700 text-sm font-bold mb-2" for="Produto">Bairro</label>
                                                                <input autocomplete="off" value="" id="bairro" class="shadow appearance-none border rounded  sm:w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="bairro" type="text" placeholder="digite o Bairro" name="district">
                                                                  @error('district')
                                                                    <div class=" p-2">
                                                                      <span class="error text-red-500">{{ $message }}</span>
                                                                    </div>
                                                                  @enderror
                                                              </div>
                                                              <div class="mb-4">
                                                                <label class="block text-gray-700 text-sm font-bold mb-2" for="Produto">Rua</label>
                                                                <input autocomplete="off" value="" id="rua" class="shadow appearance-none border rounded sm:w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="street" type="text" placeholder="digite sua Rua" name="street">
                                                                  @error('street')
                                                                    <div class=" p-2">
                                                                      <span class="error text-red-500">{{ $message }}</span>
                                                                    </div>
                                                                  @enderror
                                                              </div>
                                                              <div class="mb-4">
                                                                <label class="block text-gray-700 text-sm font-bold mb-2" for="Produto">Número</label>
                                                                <input autocomplete="off" value="" id="numero" class="shadow text-sm appearance-none border rounded sm:w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="number"  placeholder="digite seu numero" name="number">
                                                                  @error('number')
                                                                    <div class="p-2">
                                                                      <span class="error text-red-500">{{ $message }}</span>
                                                                    </div>
                                                                  @enderror
                                                              </div>

                                                              <div class="mb-4">
                                                                <label class="block text-gray-700 text-sm font-bold mb-2" for="Produto">Celular</label>
                                                                <input autocomplete="off" value="" id="fone" class="shadow text-sm appearance-none border rounded sm:w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="fone"  placeholder="digite seu celular" name="fone">
                                                                  @error('fone')
                                                                    <div class="p-2">
                                                                      <span class="error text-red-500">{{ $message }}</span>
                                                                    </div>
                                                                  @enderror
                                                              </div>
                                                        
                                                              <div class="mb-4 ">
                                                                <label class="block text-gray-700 text-sm font-bold mb-2" for="Produto">Complemento</label>
                                                                <input autocomplete="off" value="" id="complemento" class="shadow  appearance-none border rounded sm:w-full py-3 px-3 pb-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="complement" type="text" placeholder="digite um complemento" name="complement">
                                                                  @error('complement')
                                                                    <div class="p-2">
                                                                      <span class="error text-red-500">{{ $message }}</span>
                                                                    </div>
                                                                  @enderror
                                                              </div>
                                                          </div>
                                                            
                                                      <div class="pb-4">
                                                        <button type="submit" class="border text-sm p-2 rounded text-gray-700 bg-orange-300  font-bold hover:orange-500">CADASTRAR</button>
                                                      </div>
                                                </form>

                                              </div>
                                              </div>
                                          </div>
                                    </div>
                        </div>
                          
                           @if($address)
                           <div class="container">
                               
                                <div class="pb-2 yellow">
                                  <details>
                                      <summary>OBS;</summary>
        
                                      <p class="bg border rounded p-2 text-left">
                                          
                                          O sistema vai busca sempre o ultimo endereço cadastrado,se deseja  que a entrega seja feita em outro 
                                          endereço cadastre o endereço que deja. 
                                      </P>
                                  </details>
                                
                                </div>
                              <div class="container">
                                  <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" >Cidade</label>
                                    <p value="" class=" text-left border rounded sm:w-full py-2 px-3 text-gray-700 bg-orange-300" id="city" type="text" placeholder="digite a cidade" name="city">{{ $address->city ?? ''}}</p>
                                  </div>
                                  <div class="mb-4">
                                     <label class="block text-gray-700 text-sm font-bold mb-2" >CEP</label>
                                     <p value=""  class=" border rounded sm:w-full py-2 px-3 text-gray-700 text-left bg-orange-300" type="text" placeholder= "digite seu cep" name="zipcode">{{ $address->zipcode ?? '' }}</p>
                                  </div>
  
                                  <div class="mb-4">
                                      <label class="block text-gray-700 text-sm font-bold mb-2" >Bairro</label>
                                      <p value="" id="bairro" class="border rounded  sm:w-full py-2 px-3 text-gray-700 text-left bg-orange-300" id="bairro" type="text" placeholder="digite o bairro" name="district"> {{ $address->district ?? ''}}</p>
                                  </div>
  
                                  <div class="mb-4">
                                      <label class="block text-gray-700 text-sm font-bold mb-2" >Rua</label>
                                      <p value=" " id="rua" class=" text-left border rounded sm:w-full py-2 px-3 text-gray-700 bg-orange-300" id="street" type="text" placeholder="digite sua rua" name="street">{{ $address->street ?? ''}}</p>
                                  </div>
  
                                  <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" >Número</label>
                                    <p value=" " id="numero" class=" text-left border rounded sm:w-full py-2 px-3 text-gray-700 bg-orange-300" id="number" type="text"  placeholder="digite seu numero" name="number">{{ $address->number ?? ''}}</p>
                                  </div>

                                  <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" >Celular</label>
                                    <p value=" " id="celular" class=" text-left border rounded sm:w-full py-2 px-3 text-gray-700 bg-orange-300" id="celular" type="text"  placeholder="digite seu whatsap" name="number">{{ $address->fone ?? ''}}</p>
                                  </div>
                   
                                  <div class="mb-4 ">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" >Complemento</label>
                                    <p value=" " id="complemento" class=" text-left border rounded sm:w-full py-3 px-3 pb-2 text-gray-700 bg-orange-300" id="complement" type="text" placeholder="digite um complemento" name="complement">{{ $address->complement ?? ''}}</p>
                                  </div>
                            </div>
                  

                                </div>
                                       @else
                              <div class="">
                                <p class="bg mb-4">
                                  Você ainda não tem um endereço cadastrado click no botão acima para fazer o cadastro!
                                </p>
                              </div>
                           @endif

              </div>
     </div>
      {{-- <script>
        function playAlertSound() 
        {
        var audio = document.getElementById('alert-audio');
        audio.play();
        }
      </script> --}}
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script> 
        

    

    function atualizarValor() {
    const opcoes = document.getElementsByName('delivery');
    var entregaInput = document.getElementById('entrega');
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
 