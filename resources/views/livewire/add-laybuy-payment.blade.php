<div>


<div style="height:20px"></div>

@if(!$makePayment)
<div class="container">
<div class="card-panel z-depth-4" style="border-radius:20px; padding:20px;">

<table class="highlight responsive-table centered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Fullname</th>
      <th scope="col">Address</th>
      <th scope="col">PhoneNo</th>
      <th scope="col">Product</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Date placed</th>
      <th scope="col">Balance</th>
   
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

@foreach($laybuys as $key => $laybuy)
    <tr>
       <td>{{++$key}}</td>
       <td>{{$laybuy->fullname}}</td>
       <td>{{$laybuy->address}}</td>
       <td>{{$laybuy->phoneNo}}</td>
       <td>{{$laybuy->product}}</td>
       <td>K{{$laybuy->price}}</td>
       <td>{{$laybuy->quantity}}</td>
       <td>{{$laybuy->dateplaced}}</td>
       <td>K{{$laybuy->balance}}</td>


       <td>
         <button wire:click="view('{{$laybuy->product}}', '{{$laybuy->balance}}', '{{$laybuy->id}}', '{{$laybuy->laybuyId}}')" class="btn blue">view</button>
       </td>
    </tr>
@endforeach



  </tbody>
</table>

</div>
</div>

@else



<div class="container">
<div class="card-panel z-depth-4" style="border-radius:20px; padding:20px;">
<table class="highlight responsive-table centered">
  <thead>
    <tr>
      
      <th scope="col">Brand Name</th>
      <th scope="col">Balance</th>
      <th scope="col">Date deposited</th>
      <th scope="col">Amount</th>
      <th scope="col">Action</th>

     
    </tr>
  </thead>
  <tbody>

    <tr>
    

    
      <td>{{$product}}</td>
      <td>{{$balance}}</td>
      <td>
      <div class="input-group mb-3">
            <input placeholder="date deposited"  type="date" wire:model="datedeposited" class="form-control" required>
        </div>
 
      </td>

      <td>
      <div class="input-group mb-3">
            <input placeholder="amount"  type="number" wire:model="amount" class="form-control" >
        </div>
   
      </td>
      <td> <button wire:click="pay()" class="btn blue">pay</button></td>
    
    <td>   

    </td>
    
    </tr>
   
    @if($errors->has('amount'))
          <p class="red-text center">{{$errors->first('amount')}}</p>
          @endif

          @if($errors->has('datedeposited'))
          <p class="red-text center">{{$errors->first('datedeposited')}}</p>
          @endif

  </tbody>

</table>

</div>
</div>

<div style="height:40px;"></div>

@if($Transactionlaybuys)
<h4 class="center">Payment History</h4>

<div style="height:10px;"></div>

<div class="container">
<div class="card-panel z-depth-4" style="border-radius:20px; padding:20px;">

<table class="highlight responsive-table centered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Date Deposited</th>
      <th scope="col">Cash Paid</th>
      <th scope="col">Product</th>
      <th scope="col">Balance</th>


    </tr>
  </thead>
  <tbody>

@foreach($Transactionlaybuys as $key => $laybuy)

    <tr>
       <td>{{++$key}}</td>
       <td>{{$laybuy['datedeposited']}}</td>
       <td>{{$laybuy['cashPaid']}}</td>
       <td>{{$laybuy['product']}}</td>
       <td>{{$laybuy['balance']}}</td>


    </tr>
@endforeach



  </tbody>
</table>

</div>
</div>

@endif
@endif




<script>

window.addEventListener('payment-added', event => {
  M.toast({html: 'laybuy payment added successfully'});
});


window.addEventListener('overdraft-flag', event => {
  M.toast({html: 'amount is greater than current owing balance'});
});





</script>

</div>
