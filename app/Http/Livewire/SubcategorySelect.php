<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subcategory;

class SubcategorySelect extends Component
{

    public $subCategories = [];
    public  $category;
    public  $name;

    protected $listeners = [
        

        'refresh8' => '$refresh',
        'categoryAdded',
       
    
    ];


    public function mount($category){
        $this->category =  $category;
        $this->subCategories = Subcategory::where('mainCategory',$category)->get();
    }


    public function setName($name){
        $this->emit('subcategoryAdded', $name);
    }


    public function categoryAdded($category){
        
        $this->category =  $category;
        $this->subCategories = Subcategory::where('mainCategory',$category)->get();
    }


    public function render()
    {

  
        return view('livewire.subcategory-select');
    }
}
