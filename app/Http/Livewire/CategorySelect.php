<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subcategory;
use Livewire\WithPagination;
use Auth;

class CategorySelect extends Component
{

    public $addSubcategory;
    public $setCategory;


    protected $listeners = [
        
        'refresh4' => '$refresh',
        'categoryAddedForm',
    ];


    public function categoryAddedForm($category){

        if($category == "Enter product details"){

        } else {

            $this->setCategory =  $category;

        }

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

            $this->addSubcategory = null;
            $this->dispatchBrowserEvent('subcategory-added');
        } 

    }




    public function render()
    {
        return view('livewire.category-select');
    }
}
