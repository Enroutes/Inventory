<div>
    
<div style="height:80px"></div>

<div class="container" wire:ignore>
    <div class="row">


    <div class="input-field col m5 s12">
    <select wire:model="setCategory">
      <option  selected>Choose your product</option>
      @foreach($categories as $category)
      <option value="{{$category->id}}">{{$category->name}}</option>
      @endforeach
    </select>
    <label>Select Product</label>
  </div>

  @livewire('add-expense-cashover')


    </div>

  </div>

<div style="height:30px"></div>


<div class="container" >
    <div class="row">


    <div class="input-field col m5 s12">
    <select style="border-radius:20px; shadow:4px;" class="browser-default" wire:model="setCategorySpecific">
      <option  selected>Choose product to sell</option>
      @foreach($products as $key => $product)
      <option value="{{$product->id}}">{{$product->name}}</option>
      @endforeach
    </select>
    
  </div>



    </div>

  </div>

@if($selectproduct)


<div class="container">
  <div class="card z-depth-4" style="border-radius:20px; padding:20px;">

  <table class="highlight responsive-table centered">
  <thead>
    <tr>
    <th scope="col">#</th>
      <th scope="col">Add Sale</th>
      <th scope="col">Brand Name</th>
      <th scope="col">QTY Available</th>
      <th scope="col">Price</th>
      <th scope="col">Price Sold</th>
      <th scope="col">Quantity</th>
    </tr>
  </thead>
  <tbody>
  @foreach($selectproduct as $key => $product)
    <tr>

    <td>{{++$key}}</td>

    <td>


            
         <button wire:click="addSales('{{$product->id}}', '{{$product->name}}','{{$product->quantity}}','{{$product->priceSold}}', '{{$product->category}}')" class="btn btn-floating btn-small blue"><i class="material-icons">add</i></button>   
   
    </td>
      <td>{{$product->name}}</td>
      <td>{{$product->quantity}}</td>
      <td>{{$product->priceSold}}</td>
      <td>   
 
        <div class="input-group mb-3">
  
            <input min="0"  placeholder="sold @"  type="number"  wire:model="priceSold"   class="form-control" required>
        </div>
    </td>

    <td>   

        <div class="input-group mb-3">
            <input min="0"  placeholder="quantity"  type="number" wire:model="quantity"  class="form-control" required>
        </div>
    </td>
    
    </tr>
    @endforeach

  </tbody>
</table>

</div>
</div>
@endif



<div style="height:30px"></div>




@if($jsonConverted)
<div class="container">
<div class="card z-depth-4" style="border-radius:20px; padding:20px;">

<table class="highlight responsive-table centered">
  <thead>
    <tr>
    <th scope="col">#</th>
      <th scope="col">Delete Sale</th>
      <th scope="col">Brand Name</th>
      <th scope="col">QTY Sold</th>
      <th scope="col">Price</th>
      <th scope="col">Price Sold</th>
     
    </tr>
  </thead>
  <tbody>
  @foreach($jsonConverted2 as $key => $sell)
    <tr>
    
    <td>-</td>

    <td>

    <p>
      <label>
        <input value="X" class="btn-floating btn-small waves-effect waves-light red" wire:click="deleteSales('{{$key}}')" type="button"  />
        <span></span>
      </label>
    </p>
            
          
   
    </td>
   
      <td>{{$sell['name']}}</td>
      <td>{{$sell['quantity']}}</td>
      <td>K{{$sell['priceSold']}}</td>
      @if($sell['discount'] < $sell['priceSold'] )
      <td class="red-text"><b>K{{$sell['discount'] }}</b></td>
      @else
      <td>K{{$sell['discount']}}</td>
      @endif

    
    <td>   

    </td>
    
    </tr>
    @endforeach




    <tr style="border:none;">
    <td></td>
    <td></td>
    <td></td>
    <td></td>

    <td><b>TOTAL</b></td>
    <td><b>K{{$total}}<b></td>

  </tr>

  </tbody>

</table>

<button style="border-radius:10px;" wire:click="submitSales()" class="btn blue">done</button>

</div>
</div>




@endif

<script>

window.addEventListener('sale-added', event => {
  M.toast({html: 'sale added successfully'});
});

window.addEventListener('nostock-added', event => {
  M.toast({html: 'can not enter quantity as 0'});
});

window.addEventListener('nostock1-added', event => {
  M.toast({html: 'quantity entered is greater than stock available'});
});


window.addEventListener('nostock2-added', event => {
  M.toast({html: 'quantity entered is less than stock available'});
});


window.addEventListener('priceSoldNegative-added', event => {
  M.toast({html: 'price sold not valid'});
});

window.addEventListener('quantityNegative-added', event => {
  M.toast({html: 'quantity is negative'});
});


window.addEventListener('no-sales-added', event => {
  M.toast({html: 'no sales added'});
});


</script>



</div>
