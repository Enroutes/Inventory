<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Shop;
use Livewire\WithFileUploads;
use Auth;

class Dashboard extends Component
{

    use WithFileUploads;

    public $newShop;
    public $logo = '';
    public $shop;

    protected $listeners = [
        
    
        'refreshParent' => '$refresh'
    
    ];


    public function saveLogo(){


        $validateData = [
            'logo' => 'required',
        ];

    

        $filename = $this->logo->store('logos','public');

        $this->validate($validateData);

        User::where('shopId', Auth::user()->shopId)->update(['logo' => $filename]);
        $this->dispatchBrowserEvent('logo-added');
        $this->logo = null;
        $this->emit('refreshParent');


    }

      

    



    public function save(){


        $validateData = [

            'newShop' => 'required',
            

        ];

       

        $data = [
            
             'name' => $this->newShop,
             'createdBy' => Auth::user()->id,

            
        ];


        $this->validate($validateData);
      

        if(Shop::create($data)){
            $this->clearVars();
        } 

    }


    public function clearVars(){

        $this->newShop = null;
       

	    $this->emit('refreshParent');
        $this->dispatchBrowserEvent('shop-added');

    }
 

public function getShop($setShop){

    if($setShop){

        $name = Shop::where('id', $setShop)->value('name');
        User::where('id', Auth::user()->id)->update(['shopId'=> $setShop, 'shopName'=> $name]);
        
        $this->emit('refreshParent');


    }
}


    public function render()
    {

        $shop = Auth::user()->id;
        $this->shop  = $shop;

        return view('livewire.dashboard',[
            'shops' => Shop::where('createdBy', Auth::user()->id)->get()
        ]);
    }
}
