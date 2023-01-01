<div>
    
 
<div style="height:20px"></div>  
     
<div class="container">

<h4 style="font-family: 'Unica One', cursive; font-size:;" class="center">
      <b>ALL SALES </b>
      </h4>

      <div style="height:20px"></div>

      
<div class="card z-depth-4" style="border-radius:20px; padding:20px;" >

@foreach($sales as $key => $sell)

 <!--td>{{$key}}</td-->
 <p style="font-family: 'Unica One', cursive; font-size:20px;" class="pink-text">
      <b>{{$key}}</b>
      </p>

<table class="highlight responsive-table centered">
  <thead>
    <tr>
    <th>#</th>
    <th> Seller</th>
    <th>Category</th>
      <th>Brand Name</th>
      <th>Quantity</th>
      <th>Selling Price</th>
      <th> Price Sold</th>
      <th style="display:none;"><b>K{{$totalsales=0}}<b></th>
    </tr>
  </thead>
  <tbody>


  @foreach($sell as $keys => $i)
    <tr>
     
  
      <td>{{++$keys}}</td>
      <td>{{$i->sellerName}}</td>
      <td>{{$i->cate}}</td>
      <td>{{$i->name}}</td>
      <td>{{$i->quantity}}</td>
      <td>{{$i->priceSold}}</td>
      <td>{{$i->discount}}</td>
      
      <td style="display:none;"><b>K{{$totalsales += $i->discount * $i->quantity}}<b></td>
      <td style="display:none;"><b>K{{$total += ($i->discount * $i->quantity)  }}<b></td>
      <td style="display:none;"><b>K{{$cashover = $i->cashOver}}<b></td>
      <td style="display:none;"><b>K{{$expense = $i->expense}}<b></td>
      <td style="display:none;"><b>K{{$Laybuy = $sell[0]->laybuy}}<b></td>
  
    </tr>
    @endforeach

    <tr style="border:none;">
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><b>Total Sales</b></td>
    <td><b>K{{$totalsales}}<b></td>

  </tr>
  

    <tr style="border:none;">
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><b>Cash Over</b></td>
    <td><b>K{{$cashover}}<b></td>

  </tr>

  <tr style="border:none;">

  <td></td>
  <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><b>Expense</b></td>
    <td><b>K{{$expense}}<b></td>

  </tr>

  
  <tr style="border:none;">
  <td></td>
  <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td ><b>Laybuy</b></td>
    <td><b>K{{$Laybuy }}<b></td>

  </tr>


  <tr style="border:none;">
  <td></td>
  <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td ><b>Cash </b></td>
    <td><b>K{{$totalsales - $expense + $cashover + $Laybuy }}<b></td>

  </tr>


   

  </tbody>
</table>
<hr>
@endforeach
</div>
</div>


</div>
