<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class UpdateStockAvailable extends Component
{

    public $priceSold;
    public $priceBought;
    public $quantity;
    public $name;
    public $stockId;

    public $active = false;


    protected $listeners = [
        
        'StockToEdit',
	  'refresh10' => '$refresh',
       
    
    ];


    public function StockToEdit($id){


        $stock = Product::find($id);
              $this->name = $stock->name;
            $this->quantity = $stock->quantity;
         $this->priceSold = $stock->priceSold;
         $this->priceBought = $stock->priceBought;
         $this->stockId = $stock->id;



         $this->active = true;
         $this->emit('refresh9');
 }



 public function save(){

      

    $validateData = [
        'name' => 'required',
        'quantity'=>'required',
        'priceSold'=>'required',
        'priceBought'=>'required',

    ];






    $data = [

        'name' => $this->name,
        'quantity' => $this->quantity,
        'priceSold' => $this->priceSold,
        'priceBought' => $this->priceBought,

   ];






   if($this->stockId){

        Product::find($this->stockId)->update($data);
        $this->clearVars();
        

    }

}



public function clearVars(){

    $this->name = null;
    $this->quantity = null;
    $this->priceSold = null;
    $this->priceBought = null;

    $this->emit('refresh11');
    $this->emit('refresh10');
    $this->dispatchBrowserEvent('stock-updated');
    $this->active = false;

}




    

    public function render()
    {
        return view('livewire.update-stock-available');
    }
}
