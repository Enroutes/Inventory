<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \Carbon\Carbon;
use App\Models\soldProduct;
use App\Models\Expense;
use Illuminate\Support\Facades\DB;
use Auth;



class Earnings extends Component
{


    public function monthlyProfit(){

        $month_date = Carbon::now();
        $month_date->format('Y-m');

        $profit = soldProduct::where('date', 'LIKE', $month_date)->get();
    }


    public function render()
    {

        $month_date = Carbon::now();
        $newFormat = $month_date->format('Y-m');

    

        
  # CALCULATION FOR TURNOVER

        $turnover = DB::table('sold_products')
        ->select(array('sold_products.*','products.priceBought'))
        ->join('products', 'products.id', '=', 'sold_products.productId')
        ->where('sold_products.date', 'LIKE', "{$newFormat}%")
        ->where('sold_products.shop', Auth::user()->shopId)
        ->get();


        $expensesturnover = DB::table('expenses')
        ->select(array('expenses.*'))
        ->where('expenses.date', 'LIKE', "{$newFormat}%")
        ->where('shopId', Auth::user()->shopId)
        ->get();


        $totalSales = 0;
        $totalOrdered = 0;
        $totalCashover = 0;

                foreach($turnover as $profit){
                    $totalSales += $profit->discount * $profit->quantity ;
                }

                foreach($turnover as $profit){
                    $totalOrdered += $profit->priceBought * $profit->quantity;
                }

                
                foreach($expensesturnover as $expense){
                  
                    $totalCashover +=  $expense->cashOver;
                }



                    $turnOver = $totalSales + $totalCashover;

                    

#END 



# CALCULATION FOR PROFIT

$profits = DB::table('sold_products')
->select(array('sold_products.*','products.priceBought'))
->join('products', 'products.id', '=', 'sold_products.productId')
->where('sold_products.date', 'LIKE', "{$newFormat}%")
->where('sold_products.shop', Auth::user()->shopId)
->get();

$expenses = Expense::where('expenses.date', 'LIKE', "{$newFormat}%")
->where('shopId', Auth::user()->shopId)
->get();




$totalExpense = 0;

foreach($expenses as $expense){
    $totalExpense += $expense->expense;
}


$totalCashover = 0;

foreach($expenses as $expense){
    $totalExpense +=  $expense->cashOver;
}





$payments = DB::table('payments')
->select(array('payments.*'))
->where('payments.created_at', 'LIKE', "{$newFormat}%")
->where('shop', Auth::user()->shopId)
->get();

$totalPayments = 0;

foreach($payments as $payment){
    $totalPayments += $payment->amount ;
}


$totalSalesProfit = 0;
$totalOrderedProfit = 0;

        foreach($profits  as $profit){
            $totalSalesProfit += $profit->discount * $profit->quantity ;
        }

        foreach($profits as $profit){
            $totalOrderedProfit += $profit->priceBought * $profit->quantity;
        }


            $profit = $totalSalesProfit + $totalCashover  -  $totalOrderedProfit - $totalExpense - $totalPayments;

            

#END 

#CALCULATIONS FOR ANNUAL PROFIT

$newDate = $month_date->format('Y');

$annualProfits = DB::table('sold_products')
->select(array('sold_products.*','products.priceBought'))
->join('products', 'products.id', '=', 'sold_products.productId')
->where('sold_products.date', 'LIKE', "{$newDate}%")
->where('sold_products.shop', Auth::user()->shopId)
->get();

$annualExpenses = Expense::where('expenses.date', 'LIKE', "{$newDate}%")
->where('shopId', Auth::user()->shopId)
->get();


$annualPayments = DB::table('payments')
->select(array('payments.*'))
->where('payments.created_at', 'LIKE', "{$newDate}%")
->where('shop', Auth::user()->shopId)
->get();



$annualTotalSales=0;
$annualTotalBought=0;
$annualTotalExpenses=0;
$annualTotallPayments=0;
$annualTotalCashOver=0;

foreach($annualProfits as $annualProfit){
    $annualTotalSales += $annualProfit->discount * $annualProfit->quantity;
    $annualTotalBought+= $annualProfit->priceBought * $annualProfit->quantity;

}


foreach($annualExpenses as $annualExpense  ){

    $annualTotalExpenses+= $annualExpense->expense;
    $annualTotalCashOver+=$annualExpense->cashOver;


}

foreach($annualPayments  as $annualPayment){

    $annualTotallPayments+=$annualPayment->amount;
}


$annualTotalProfit= $annualTotalSales+$annualTotalCashOver-$annualTotalBought-$annualTotalExpenses-$annualTotallPayments;

#END



                  

        return view('livewire.earnings',[
            'monthlyTurnOver' => $turnOver,
            'monthlyProfit' => $profit,
            'annualProfit'  => $annualTotalProfit,
            
        ]);
    }
}
