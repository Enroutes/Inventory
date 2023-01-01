<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Auth;
use Livewire\WithPagination;

class Categories extends Component
{


    use WithPagination;

    public $name;
  

    public $viewCategoryTable = false;
    public $viewEntryForm = true;




    protected $listeners = [
        

        'refresh3' => '$refresh',
        'deleteCategory' => 'delete'
       
    
    ];



    public function viewTable(){
        $this->viewCategoryTable = true;
        $this->viewEntryForm = false;
    }


    public function hideTable(){
        $this->viewCategoryTable = false;
        $this->viewEntryForm = true;
    }




    public function delete($id){

        if(Category::destroy($id)){
            $this->dispatchBrowserEvent('category-deleted');
        }

    }






    public function save(){


        $validateData = [

            'name' => 'required',
            //'shop'=>'required',

        ];

       

        $data = [
            
             'name' => $this->name,
             'shop_id' => Auth::user()->shopId,

            
        ];


        $this->validate($validateData);
      

        if(Category::create($data)){
            $this->clearVars();
        } 

    }



    public function clearVars(){

        $this->name = null;
        //$this->shop = null;

	$this->emit('refresh3');
        $this->dispatchBrowserEvent('category-added');

    }




    public function render()
    {
        return view('livewire.categories',['categories' => Category::where('shop_id', Auth::user()->shopId)->get()]);
    }
}
