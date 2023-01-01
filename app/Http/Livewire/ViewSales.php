<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\User;
use App\Models\Shop;
use Illuminate\Support\Facades\DB;
use Auth;


class ViewSales extends Component
{
    public $totalsales;
    public $total;
    public $expenses;
    public $cashover;
    public $Laybuy ;

    public function render()
    {

        /*$sales = DB::table('sold_products')
        ->select('sold_products.name','sold_products.quantity','sold_products.priceSold','sold_products.discount')
        ->join('shops', 'sold_products.shop', '=', 'shops.id')
        ->join('users', 'users.shopId', '=', 'shops.id')
        ->where('users.id', Auth::user()->id)
        ->groupBy('sold_products.date')
        ->paginate(10);*/

        //return dd($sales);

        $user = Auth::user()->id;
        $shop = Auth::user()->shopId;

        $sales = DB::select( DB::raw("select tableTemp.* , expenses.expense, expenses.cashOver , categories.name as cate  FROM `sold_products` as tableTemp 
                                    inner join ( select * from `sold_products` group by date ) as tableTemp2 on tableTemp.date = tableTemp2.date 
                                    inner join `expenses` on expenses.date = tableTemp.date inner join shops on tableTemp.shop = shops.id
                                    inner join categories on categories.id = tableTemp.category
                                     where tableTemp.shop=$shop  &&  expenses.shopId=$shop  order by date desc"));


    $laybuys=DB::select(DB::raw("select sum(cashPaid) as cashPaid,laybuy_transactions.datedeposited from laybuy_transactions where shop=$shop group by datedeposited"  ));




//return dd($laybuys);

             $groupedSales = array();
             

            foreach ($sales as $sale){

                $sale->laybuy=0;

            if (!array_key_exists($sale->date , $groupedSales)){
                $groupedSales[$sale->date] = array();
            } 
                
           $groupedSales[$sale->date][] = $sale;


            }

            #add laybuy payment

            

                foreach($laybuys as $laybuy ){
                    
                    $sale = array(
                        "id"=> 0,
                        "name" => "No sales",
                        "priceSold"=> 0.0,
                        "quantity"=> 0,
                        "sellerName"=> "No sales",
                        "discount"=> 0,
                        "expense"=> 0.0,
                        "cashOver"=> 0.0,
                        "cate"=> "No sales",
                        "laybuy"=> 0.0
                       

                    );

                    $saleObj= (object) $sale;
                    


                   if(array_key_exists($laybuy->datedeposited, $groupedSales)){

                    $groupedSales[ $laybuy->datedeposited][0]->laybuy=$laybuy->cashPaid;

                   }else{

                    $groupedSales[$laybuy->datedeposited] = array();
                    $groupedSales[$laybuy->datedeposited][] = $saleObj;
                    $groupedSales[ $laybuy->datedeposited][0]->laybuy=$laybuy->cashPaid;
                      

                   }

                   

                    
                }

          

krsort($groupedSales);

       //return dd($groupedSales);

       /* foreach($groupedSales as $purchase){
            foreach($purchase as $item){

                $calculation = $item->discount *  $item->quantity;
            //$subtotal += $calculation;


            }
            $purchase;
            
            


            $calculation = $purchase->discount *  $purchase->quantity;
            $this->total += $calculation;
        }*/


        return view('livewire.view-sales',[
            'sales' => $groupedSales
        ]);
    }
}
