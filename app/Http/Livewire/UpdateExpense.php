<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Payment;
use Livewire\WithFileUploads;


class UpdateExpense extends Component
{

     use WithFileUploads;

    public $name;
    public $amount;
    public $expenseId;



    public $active = false;

    
    protected $listeners = [
        
        'ExpenseToEdit',
	  'refresh9' => '$refresh',
       
    
    ];


    public function ExpenseToEdit($id){


           $expense = Payment::find($id);
            $this->name = $expense->name;
            $this->amount = $expense->amount;
            $this->expenseId = $expense->id;
 


            $this->active = true;
            $this->emit('refresh9');
    }





  public function save(){

      

        $validateData = [
            'name' => 'required',
            'amount'=>'required',


        ];






        $data = [
            'name' => $this->name,
            'amount' => $this->amount,

           
       ];





   
       if($this->expenseId){

            Payment::find($this->expenseId)->update($data);
            $this->clearVars();
            

        }

    }






    public function clearVars(){

        $this->name = null;
        $this->amount = null;

        $this->emit('refresh9');
        $this->dispatchBrowserEvent('expense-updated');
        $this->active = false;

    }


    public function render()
    {
        return view('livewire.update-expense');
    }
}
