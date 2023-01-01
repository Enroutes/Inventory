<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Expense;
Use \Carbon\Carbon;
use Auth;

class AddExpenseCashover extends Component
{

    public $expense;
    public $cashover;


    
    protected $listeners = [

        'refresh1' => '$refresh',
    ];


    public function save(){

       if(!$this->expense){
           $this->expense = 0;
          
       }elseif(!$this->cashover){
        $this->cashover = 0;
    }

$date = now();

        $data = [
            
             'expense' => $this->expense,
             'cashOver' => $this->cashover,
             'shopId' => Auth::user()->shopId,
             'date' => $date

            
        ];

        $date = Carbon::now()->toDateString();

        $exists = Expense::where('date', $date)->where('shopId', Auth::user()->shopId)->first();

        

       
       
      
     if($exists){

        Expense::where('id', $exists['id'])->update(['expense' => $this->expense, 'cashOver' => $this->cashover]);
        $this->dispatchBrowserEvent('expense-updated');
        $this->clearVars();


     } else {

        if(Expense::create($data)){
            $this->dispatchBrowserEvent('expense-added');
            $this->clearVars();
        } 
        
     }


    }


    public function clearVars(){

        $this->expense = null;
        $this->cashover = null;



    }



    public function render()
    {
        return view('livewire.add-expense-cashover');
    }
}
