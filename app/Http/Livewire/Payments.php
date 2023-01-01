<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Payment;
use Livewire\WithPagination;
use Auth;


class Payments extends Component
{


    use WithPagination;

    public $name;
    public $amount;
    public $viewExpenseTable = false;
    public $viewEntryForm = true;




    protected $listeners = [
        

        'refresh6' => '$refresh',
       
    
    ];



    public function viewTable(){
        $this->viewExpenseTable = true;
        $this->viewEntryForm = false;
    }


    public function hideTable(){
        $this->viewExpenseTable = false;
        $this->viewEntryForm = true;
    }

    public function edit($id){

        $this->idd = $id;
        
       $this->emit('ExpenseToEdit', $id);
    }


    public function delete($id){

        if(Payment::destroy($id)){
            $this->dispatchBrowserEvent('payment-deleted');
        }

    }






    public function save(){


        $validateData = [

            'name' => 'required',
            'amount'=>'required',

        ];

       

        $data = [
            
             'name' => $this->name,
             'amount' => $this->amount,
             'shop' => Auth::user()->shopId,

            
        ];


        $this->validate($validateData);
      

        if(Payment::create($data)){
            $this->clearVars();
        } 

    }



    public function clearVars(){

        $this->name = null;
        $this->amount = null;

	$this->emit('refresh6');
        $this->dispatchBrowserEvent('payment-added');

    }




    public function render()
    {
        return view('livewire.payments',['expenses' => Payment::where('shop', Auth::user()->shopId)->get()]);
    }
}
