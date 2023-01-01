<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\Subcategory;
use Livewire\WithPagination;
use Auth;

class StockManager extends Component
{

    use WithPagination;

    public $setCategory = null;
    public $priceOrdered;
    public $sellingPrice;
    public $quantity;
    public $name = "hello";
    public $categories;
    public $subCategories = [];
    public  $quantityUpdate = 0;
    public $addSubcategory;




    
    protected $listeners = [
        

        'refresh7' => '$refresh',
        'subCategory',
        'subcategoryAdded',
       
    
    ];


    public function mount()
    {

        $this->categories = Category::where('shop_id', Auth::user()->shopId)->get(); 
      
    }


    public function subcategoryAdded($name){
        $this->name = $name;
    }




    public function saveSubcategory(){


        $validateData = [

            'addSubcategory' => 'required',
             'setCategory' => 'required',
   
        ];

       
        $data = [
            
              'productName' => $this->addSubcategory,
             'mainCategory' => $this->setCategory,
                     'shop' => Auth::user()->shopId      
        ];


        $this->validate($validateData);
      

        if(Subcategory::create($data)){
            //$this->clearVarsCategory();
     
        } 

    }








    public function save(){


        
        $validateData = [

            'priceOrdered' => 'required|min:1',
            'sellingPrice' => 'required|min:1',
                'quantity' => 'required|min:1'
              

        ];

       

        $data = [
            
               'priceBought' => $this->priceOrdered,
                 'priceSold' => $this->sellingPrice,
                  'quantity' => $this->quantity,
                      'shop' => Auth::user()->shopId,
                   'category'=> $this->setCategory,
                      'name' => $this->name

            
        ];


        $this->validate($validateData);
      

 

        $exists = Product::where('category',$data['category'])->where('name',$data['name'])->first();

       

        if($exists === null){

            Product::create($data);

            $data = array_merge($data,[
                'productId' => Product::where('category',$data['category'])->value('id'),
            ]);

            Order::create($data);
            $this->clearVars();

       

         } elseif ($exists !=  null) {

            
             
            $quantityUpdate1  =  Product::where('category',$data['category'])->value('quantity');
            $this->quantityUpdate = (int)$quantityUpdate1 + $this->quantity;

           Product::where('category',$data['category'])->update(['quantity' => $this->quantityUpdate]);

           $data = array_merge($data,[
            'productId' => Product::where('category',$data['category'])->value('id'),
        ]);

           Order::create($data);

           $this->clearVars();

         }
 

        


           

         


    }



    public function clearVars(){

        $this->priceOrdered = null;
        $this->sellingPrice = null;
        $this->quantity = null;
        $this->name = null;

	$this->emit('refresh7');
        $this->dispatchBrowserEvent('stock-added');

    }



    public function clearVarsCategory(){

        $this->addSubcategory = null;
  

	$this->emit('refresh7');
        $this->dispatchBrowserEvent('stock-added');

    }




    public function render()
    {

        
        if($this->setCategory){
            $this->emit('categoryAddedForm', $this->setCategory);
        }

        if($this->setCategory){
            $this->subCategories = Subcategory::where('mainCategory',$this->setCategory)->get();
            $this->emit('categoryAdded', $this->setCategory);
        }

        return view('livewire.stock-manager'); 
    }
}
