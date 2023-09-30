<div>
  <div class="text-center sm:ml-32 ml-32">
    <div class="w-full max-w-xs">
      @if (session()->has('message'))
        <div class="text-green-600">
            {{ session('message')}}  
        </div>
      @endif
      <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 " method="post" wire:submit.prevent="create">
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="Produto">Produto</label>
          <input autocomplete="off"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="digit nome do produto" wire:model="name">
          @error('name')
            <span class="error text-red-600">{{ $message }}</span>
          @enderror
        </div>

        <div class="mb-6">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="discrição"> Descrição </label>
          <input autocomplete="off" class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="text" placeholder="discrição" wire:model="description">
          @error('description')
          <span class="error text-red-600">{{ $message }}</span>
        @enderror
          {{-- <p class="text-red-500 text-xs italic">Please choose a password.</p> --}}

        </div>
        <div class="mb-6">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="price">Preço</label>
          <input autocomplete="off" class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="number" placeholder="digite o preço" wire:model="price">
          @error('price')
          <span class="error text-red-600">{{ $message }}</span>
        @enderror
          {{-- <p class="text-red-500 text-xs italic">Please choose a password.</p> --}}
        </div>
        <div class="mb-6">
         
          <label class="block text-gray-700 text-sm font-bold mb-2" for="price">Categoria</label>
          <select wire:model="id" name="categoria" id="">
          
            @foreach ($category as $item)
                <option  value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
          </select>
      
              
          
       
        </div>

        <div class="flex items-center justify-between">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            cadastrar
          </button>
          {{-- <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
            Forgot Password?
          </a> --}}
        </div>
      </form>
     
  
    <div class=" max-w-full ">
      <table class="w-full ">
        <thead>
          <tr>
               {{-- <th></th>       --}}
              <th class="p-2">LANCHES</th>
              <th class="p-2">INGREDIENTES</th>
              <th class="p-12" >PREÇO</th>
          </tr>
        </thead>
    
        <tbody class="">
          @foreach ($product as $products)
          <tr>
            {{-- <td class="">{{$products->id}}-</td> --}}
            <td class="p-4">{{$products->name}} <hr class="linear-1"></td>
            <td class="">
              <details>
                <summary>INGREDIENTES</summary>
                <p class="text-center mr-12 border border-blue-800 bg-slate-900 p-2 rounded">{{$products->description}}</p>
              </details>
              <hr class="linear">
            </td>
            <td class="">{{$products->price}}</td>
            <td><button><i class="fa-regular fa-pen-to-square"></i></button></td>
            <td><button><i class="fa-solid fa-trash pr-8 p-2"></i></button></td>
          </tr>
          @endforeach
        
        </tbody>
       
      </table>
   
     
   </div>
   {{ $product->links()}}
  
      <p class="text-center text-gray-500 text-xs">
 
        &copy;2020 Acme Corp. All rights reserved.
      </p>
  </div>

  </div>
 
</div>
