<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AddMember;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Auth;

class AddMembers extends Component
{

    public $shops;
    public $name;
    public $email;
    public $password;
    public $usertype;
    public $shopId;
    public $viewMembers = false;


        
    protected $listeners = [
        
        'refresh2' => '$refresh',
    ];




    public function mount()
    {
        $this->shops = Shop::where('createdBy', Auth::user()->id)->get(); 
    }


    public function getMembers(){

        if(!$this->viewMembers){

            $this->viewMembers = true;
            $this->emit('refresh2');

        } else{

            
            $this->viewMembers = false;
            $this->emit('refresh2');

        }
 
    }






    public function save(){


         $validateData = [

                'name'=>'required',
                'shopId'=>'required',
               'email' => 'required',
            'password' => 'required',
            'usertype' => 'required',

        ]; 

       if($this->name == "select usertype"  || $this->shopId == "select name" ){

           
       } else {

        $data = [
            
                'name' => $this->name,
               'email' => $this->email,
               'shopId' => $this->shopId,
               'usertype' => $this->usertype,
               'logo' => Auth::user()->logo,
               'shopName' => Shop::where('id', $this->shopId)->value('name'),
               'password' => Hash::make($this->password),

            
        ];


        $this->validate($validateData);
      
       

        if(User::create($data)){
            $this->clearVars();
            

     }

    }

 }


    public function clearVars(){

                  
                $this->name  = null;
                $this->email = null;
             $this->password = null;

             $this->dispatchBrowserEvent('user-added');
             $this->emit('refresh2');


    }



    public function render()
    {

        return view('livewire.add-members');
    }
}
