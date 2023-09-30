<div>
    <!-- An unexamined life is not worth living. - Socrates -->
    <div class=" orange bg-orange-500  w-full">
      <table class="w-full">
        <thead>
          <tr>
               <th></th>      
              <th class="p-2">LANCHES</th>
              <th class="p-2">INGREDIENTES</th>
              <th class="pl-8" >PREÇO</th>
          </tr>
        </thead>
        <tbody class="">
          @foreach ($product as $products)
              <tr>
               <td class="">
                <button class="btn btn-success ml-2" data-bs-toggle="modal"
                data-bs-target="#firstModal{{$products->id}}"><i class="fa-sharp fa-solid fa-cart-plus text-white"></i></button>
                  <div class="modal fade" id="firstModal{{$products->id}}" tabindex="-1"
                      aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header,btn btn-warning">
                                  {{-- <h2 class="modal-title pt-4 ml-40" id="exampleModalLabel text-center">Adiciona este produto em seu carrinho</h2> --}}
                                  <button type="button" class="btn-close " data-bs-dismiss="modal"   aria-label="Close">X
                                  </button>
                              </div>
                              <div class="modal-body">
                                  <Form action="{{ route('store.cart',$products->id)}}" method="post">
                                      @csrf
                                      <div class="text  pt-4 rounded">
                                        <form class="grup-control">
                                            <fieldset>
                                                <div class="label text-center">
                                                 <strong><h1>PRODUTO</h1></strong>
                                                  <input type="text" disabled class=" p-2  rounded "  name="product_id" id="product_id" value="{{ $products->name }}"/><br>
                                                </div>
                                                <div class=" mt-2 label2 text-center">
                                                <strong><h1>DESCRIÇÃO</h1></strong>
                                                  <input type="text" disabled class=" p-2 rounded " id="description" value="{{ $products->description }}"/><br>
                                                </div>
                                                <div class=" mt-2 label2 text-center">
                                                  <strong><h1>QUANTIDADE</h1></strong>
                                                  <input type="number" min="1"  class=" p-2  rounded text-center " name="quanty" value="{{ $products->quanty }}"/><br>
                                                </div>
                                                <div class="label3 text-center p-2">
                                                <strong><h1>PREÇO UNITARIO</h1></strong>
                                                  <input type="text"  disabled class=" rounded text-center " name="price" id="price" value="{{number_format($products->price,2,',','.') }}"/><br>
                                                </div>
                                                <div class="text-center p-2">
                                                 <strong><label for="">ADICIONAIS</label></strong>
                                                </div>
                                                <div class="text-center  rounded">
                                                  <select class=" rounded" name="additional" id="additional">
                                                    @foreach( $adde as $add)
                                                      <option class=" bg-orange-500 " value="{{$add->id}}">{{$add->name}}-R$-{{ number_format($add->price,2,',','.') }}</option>
                                                    @endforeach
                                                  </select>
                                                </div>
                                                <div class=" p-2 text-center">
                                                  <strong><h1>OBSERVAÇÃO</h1></strong>
                                                  <input type="text" autocomplete="off" class="  rounded " placeholder="Ex: sem tomate" name="observation" id="observation" value="{{$products->observation}}">
                                                </div>
                                                <div class="flex flex-col gap-2">
                                                  <button class="btn btn-success text-with bg-success m-2" type="submit">ADICIONAR</button>
                                                  <button type="button" class="btn btn-warning bg-warning m-2"data-bs-dismiss="modal">Cancelar</button>
                                                </div>
                                            </fieldset>
                                        </form>
                                      </div>
                                  </Form>
                              </div>
                              </div>
                          </div>
                      </div>
 
              </td> 
              <td class="p-4 sm:w-60">{{$products->name}} <hr class="linear-1"></td>
              <td class="">
                  <details>
                  <summary>INGREDIENTES</summary>
                  <p class="text-center mr-12 border border-blue-800 bg-slate-900 p-2 rounded">{{$products->description}}</p>
                  </details>
                  <hr class="linear">
              </td>
              <td class="pl-16 text-2xl text-white price">R$-{{ number_format($products->price, 2, ',','.')}}</td>
              </tr>
          @endforeach
        </tbody>
  
      </table>
  </div> 
</div>