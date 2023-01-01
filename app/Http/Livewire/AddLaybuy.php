<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Laybuy;
use Illuminate\Support\Facades\DB;
use Auth;

class AddLaybuy extends Component
{

   
    public $product;
    public $quantity;
    public $fullname;
    public $address;
    public $phoneNo;
    public $dateplaced;
    public $duedate;
    public $price;
    public $subCategories;
    public $productselected;
    


    public function save(){


        $validateData = [

            'fullname' => 'required',
            'address' => 'required',
            'phoneNo' => 'required',
            'dateplaced' => 'required',
            'duedate' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'product' => 'required',
        
  
          

        ];

       

        $data = [
            
                'fullname' => $this->fullname,
               'address' => $this->address,
               'phoneNo' => $this->phoneNo,
               'shop' => Auth::user()->shopId,

        ];

        $calculated = $this->price * $this->quantity;
    


        $this->validate($validateData);
      
       

        if(Customer::create($data)){


            $customer = Customer::where('shop', Auth::user()->shopId)
            ->where('phoneNo', $this->phoneNo)
            ->where('fullname', $this->fullname)
            ->where('address', $this->address)
            ->value('id');


        $categoryName = Category::where('id', $this->product)->value('name');
        $subcategoryName = Product::where('id', $this->productselected)->value('name');

      

            
        $dataLaybuy = [
            
            'dateplaced' => $this->dateplaced,
               'duedate' => $this->duedate,
              'quantity' => $this->quantity,
                 'price' => $this->price,
               'balance' => $calculated,
               'product' => $subcategoryName,
              'category' => $categoryName,
             'customerId'=> $customer,
                  'shop' => Auth::user()->shopId,

    ];


        $this->validate($validateData);

            Laybuy::create($dataLaybuy);

            $oldQuantity = Product::where('category', $this->product)->value('quantity');
            $newQuantity = (int)$oldQuantity - (int)$this->quantity;

            if($this->quantity >=  $oldQuantity ){

                $this->dispatchBrowserEvent('excess-quantity');

            } else {
                Product::where('category', $this->product)->update(['quantity' => $newQuantity]);
                $this->clearVars();
            }
         
            
            
    

     }

 }


 
 public function clearVars(){

                  
     $this->fullname = null;
     $this->address = null;
     $this->phoneNo = null;
     $this->dateplaced = null;
     $this->duedate = null;
     $this->quantity = null;
     $this->price = null;
     $this->product = null;
     $this->subCategories = null;
     $this->productselected = null;
     

     $this->dispatchBrowserEvent('laybuy-added');


}


    public function render()
    {

        if($this->product){
               $this->subCategories = Product::where('category', $this->product)->where('shop', Auth::user()->shopId)->get();
       
        } 


        if($this->productselected){
        
            $available = Product::where('id', $this->productselected)->first();
        
            $this->price = $available['priceSold'];

     } else {

         $available = [];

     }

   


        return view('livewire.add-laybuy',[
            'categories' => Category::where('shop_id', Auth::user()->shopId)->get(),
            'available' => $available,
        ]);
    }
}
