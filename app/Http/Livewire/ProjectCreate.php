<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
class ProjectCreate extends Component

{
   public $name;
   public $price;
   public $description;
   public $quanty;
   public $category;
   public $id;

   protected $rules = [
     'name' => 'required',
     'price' => 'required',
     'description' => 'required',
   ];

   protected $messages = [
    'name.required' => 'o nome do produto é obrigatorío.',
    'price.required' => 'o campo preço é obrigatorio.',
    'description.required' => 'O campo descrição é obrigatorío',
   ];
 




    public function __construct(){
        $categorys = Category::all();
        $this->category = $categorys;
        $this->id = $categorys[0]->id;
    }
     
       
    
    public function create(){
       
      $this->validate();
       
      $product = Product::create(

        [
            'name' => $this->name,
            'price' => $this->price,
            'description'=> $this->description,
            'quanty'  => $this->quanty,
            'category_id' => $this->id,
    
          ]
      
        );
        session()->flash('message','Produto cadastrado com sucesso!');
     

       
     
    }
    

    public function render()
    {
        return view('livewire.project-create', [
          'product' => Product::paginate(10),
        ]);
    }

}
