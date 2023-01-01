<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Expense;
use App\Models\Category;
use App\Models\soldProduct;
Use \Carbon\Carbon;
use Auth;

class AddSales extends Component
{

    public $products = [];
    public $categories;
    public $setCategory;
    public $setCategorySpecific;
    public $addedSales = array();
    public $quantity = 0;
    public $priceSold = null;
    public $jsonConverted;
    public $jsonConverted2;
    public $idd;
    public $total = 0;
    public $selectproduct;
   


    public function mount()
    {

        $this->categories = Category::where('shop_id', Auth::user()->shopId)->get(); 
      
    }



    public function addSales($id, $productName, $productQuantity, $priceSold,$productCategory ){

     
        if($this->quantity != 0 || $this->quantity < 0){

            if(($productQuantity >= $this->quantity && $productQuantity != 0) && ($this->quantity > 0 && $this->priceSold > 0) ){

                //if(){}

     
                $neededObject = array_filter(
                    $this->addedSales,
                    function ($e) use (&$id) {
                        return $e['id'] == $id;
                    }
                );

                $neededObject = json_encode($neededObject);
                $neededObject = json_decode( $neededObject, true );
              
              if(!$neededObject){

                $date = now();


               
                $sum = (int)$this->priceSold *  (int)$this->quantity;

                array_push($this->addedSales, (object)[
                          'id' => $id,
                        'name' => $productName,
                   'priceSold' => $priceSold,
                    'quantity' => $this->quantity,
                    'category' => $productCategory,
                        'shop' => Auth::user()->shopId,
                        'sellerName' => Auth::user()->name,
                    'discount' =>  $this->priceSold,
                         'sum' => $sum,
                         'date' =>  $date,
                         'productId' =>$id,
            ]);
    
                    $this->quantity = null;
                    $this->priceSold = null;
    
    
                
    
                    $this->total = 0;
                    $this->convertToJson();

                } elseif($neededObject) {
                   

                if(($productQuantity - $neededObject[0]['quantity']) >= $this->quantity ){

                  $date = now();
                            
                $sum = (int)$this->priceSold *  (int)$this->quantity;

                array_push($this->addedSales, (object)[
                          'id' => $id,
                        'name' => $productName,
                   'priceSold' => $priceSold,
                    'quantity' => $this->quantity,
                    'category' => $productCategory,
                        'shop' => Auth::user()->shopId,
                    'sellerName' => Auth::user()->name,
                    'discount' =>  $this->priceSold,
                         'sum' => $sum,
                         'date' => $date,
                         'productId' =>$id,
            ]);
    
                    $this->quantity = null;
                    $this->priceSold = null;
    
    
                
    
                    $this->total = 0;
                    $this->convertToJson();

                } else {

                    return dd($neededObject);
                    $this->dispatchBrowserEvent('nostock-added');
                }



                } else {

                    return dd($neededObject);
                }

                


            }
            
            
            
            
            
            
            
            
            else {

                if($this->quantity > 0){
                    $this->dispatchBrowserEvent('priceSoldNegative-added');
                }else{

                    if($this->quantity > 0){
                        $this->dispatchBrowserEvent('nostock1-added');
                    }else{
                        $this->dispatchBrowserEvent('nostock2-added');
                    }
                    
                }

                
                
               }
        



       } else {

        
        if($this->priceSold < 0){
            $this->dispatchBrowserEvent('quantityNegative-added');
            
          
        }else{
           
            $this->dispatchBrowserEvent('nostock-added');
        }


      

       }

         

    }


    public function deleteSales($id){

          $this->idd = $id;

           unset($this->addedSales[$id]);

        
         $this->convertToJsonDelete();
        

            

         

    }


    public function convertToJson(){

        $this->jsonConverted = json_encode($this->addedSales);
        $this->jsonConverted2 = json_decode( $this->jsonConverted, true );


        foreach($this->jsonConverted2 as $purchase){
    
            
            $this->total += $purchase['sum'];

    }

}


    public function convertToJsonDelete(){

        $this->jsonConverted = json_encode($this->addedSales);
        $this->jsonConverted2 = json_decode( $this->jsonConverted, true );

           $this->total = 0;

        foreach($this->jsonConverted2 as $purchase){
    
            
            $this->total += $purchase['sum'];

    }

    


   
    }



     public function submitSales(){

//return dd($this->addedSales);

      if($this->addedSales){

        foreach($this->addedSales as $sale){

            $date = Carbon::now()->toDateString();
            $exists = Expense::where('date', $date)->where('shopId', Auth::user()->shopId)->first();

            if(!$exists){

                    $date = now();
                
                    $data = [
                        
                        'expense' => 0,
                        'cashOver' => 0,
                        'shopId' => Auth::user()->shopId,
                        'date' => $date,

                    
                ];

                Expense::create($data);


                if(soldProduct::create($sale)){

                    $productQuantity = Product::where('name', $sale['name'])->where('category',$sale['category'])->value('quantity');
                    $productQuantity = $productQuantity - $sale['quantity'];
     
                         Product::where('name', $sale['name'])->where('category',$sale['category'])->update(['quantity'=> $productQuantity]);
     
                 }
     


            } else {
            
            if(soldProduct::create($sale)){

               $productQuantity = Product::where('name', $sale['name'])->where('category',$sale['category'])->value('quantity');
               $productQuantity = $productQuantity - $sale['quantity'];

                    Product::where('name', $sale['name'])->where('category',$sale['category'])->update(['quantity'=> $productQuantity]);

            }

        }
            

        }
        
        $this->total = 0;
        $this->addedSales = array();
        $this->convertToJson();

        $this->dispatchBrowserEvent('sale-added');

    }else{

    $this->dispatchBrowserEvent('no-sales-added');
    }

     }





    public function render()
    {

        if($this->setCategory){
            $this->products = Product::where('category', $this->setCategory)->where('quantity', '!=', 0)->get();
        }

        if($this->setCategorySpecific){
            $this->selectproduct = Product::where('id', $this->setCategorySpecific)->where('quantity', '!=', 0)->get();
        }


        return view('livewire.add-sales');
    }
}
