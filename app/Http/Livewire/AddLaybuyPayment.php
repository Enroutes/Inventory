<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\LaybuyTransaction;
use App\Models\Laybuy;
use Auth;

class AddLaybuyPayment extends Component
{

    public $datedeposited;
    public $amount;
    public $makePayment = false;


    public $product;
    public $balance;
    public $customerId;
    public $laybuyId;
    public  $Transactionlaybuys = null;



    public function view($product, $balance, $customerId, $laybuyId){

        $this->makePayment = true;

        $this->product = $product;
        $this->balance = $balance;
        $this->customerId = $customerId;
        $this->laybuyId = $laybuyId;

        $this->Transactionlaybuys = LaybuyTransaction::where('customerId', $customerId)->where('product', $product)->where('shop', Auth::user()->shopId)->get();
     
    }

    public function pay(){
 
        $validateData = [

            'datedeposited' => 'required',
            'amount' => 'required|gt:0',

        ];

        $updatedBalance = $this->balance - $this->amount;

        $data = [
            
            'datedeposited' => $this->datedeposited,
                  'balance' => $updatedBalance,
                 'cashPaid' => $this->amount,
               'customerId' => $this->customerId,
                     'shop' => Auth::user()->shopId,
                  'product' => $this->product,

    ];


    $this->validate($validateData);
      
        if($this->balance >= $this->amount){


            if(LaybuyTransaction::create($data)){

                Laybuy::where('id', $this->laybuyId)->update(['balance' => $updatedBalance]);

                $this->makePayment = false;
                $this->clearVars();
            }

            
        } else {
            $this->dispatchBrowserEvent('overdraft-flag');
        }
        

    }


    public function clearVars(){
        $this->amount = null;
        $this->datedeposited = null;
        $this->product = null;
        $this->balance = null;
        $this->customerId = null;
        $this->laybuyId = null;
        $this->dispatchBrowserEvent('payment-added');
    }


    public function render()
    {

        $laybuys = DB::table('customers')
        ->select(array('customers.id','laybuys.dateplaced', 'laybuys.balance', 'laybuys.product',  'laybuys.quantity',  'laybuys.price','customers.fullname', 'customers.address', 'customers.phoneNo', DB::raw('(laybuys.id) as laybuyId')))
        ->join('laybuys', 'customers.id', '=', 'laybuys.customerId')
        ->where('laybuys.shop', Auth::user()->shopId)
        ->orderBy('laybuys.created_at', 'DESC')
        ->get();

       

        
      

        return view('livewire.add-laybuy-payment',[

                      'laybuys' => $laybuys,
    
        ]);
    }
}
