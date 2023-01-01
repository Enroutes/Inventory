<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\User;
use App\Models\Shop;
use Illuminate\Support\Facades\DB;
use Auth;


class StockAvaliable extends Component
{

    
    protected $listeners = [
        
    
	  'refresh11' => '$refresh',
      'deleteStock',
       
    
    ];

    public $category;



    public function edit($id){

       $this->emit('StockToEdit', $id);
    }


    
    public function deleteStock($id){

        if(Product::destroy($id)){
            $this->dispatchBrowserEvent('stock-deleted');
        }

    }




    public function render()
    {

        if($this->category){

            $stocks = DB::table('products')
            ->select('products.*')
            ->join('shops', 'products.shop', '=', 'shops.id')
            ->join('users', 'users.shopId', '=', 'shops.id')
            ->where('users.id', Auth::user()->id)
            ->where('products.category', $this->category)
            ->paginate(10);

        } else {
            $stocks = [];
        }
  

        $categories = DB::table('categories')
        ->select('categories.*')
        ->where('categories.shop_id', Auth::user()->shopId)
        ->get();


        return view('livewire.stock-avaliable',[
            'stocks' => $stocks,
            'categories'=> $categories,
        ]);
    }
}
