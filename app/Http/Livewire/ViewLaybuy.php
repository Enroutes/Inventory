<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Auth;

class ViewLaybuy extends Component
{
    public function render()
    {

        
        $laybuys = DB::table('customers')
        ->select(array('customers.id','laybuys.dateplaced','laybuys.duedate','laybuys.category', 'laybuys.balance', 'laybuys.product',  'laybuys.quantity',  'laybuys.price','customers.fullname', 'customers.address', 'customers.phoneNo', DB::raw('(laybuys.id) as laybuyId')))
        ->join('laybuys', 'customers.id', '=', 'laybuys.customerId')
        ->where('laybuys.shop', Auth::user()->shopId)
        ->get();


        return view('livewire.view-laybuy',[
            'laybuys' => $laybuys
        ]);
    }
}
