<div>
<div class="container">
<div class="container">

<div style="height:20px"></div>


<div class="container">

<h4 style="font-family: 'Unica One', cursive; font-size:;" class="center">
      <b>CUSTOMER INFO</b>
      </h4>

      </div>


<div style="height:10px"></div>

  <form wire:submit.prevent="save" style="border-radius:10px; padding:20px;" class="card-panel ">

 



  <div class="form-group">
  <input placeholder="fullname"  type="text" wire:model="fullname" class="form-control" required >
  </div>

  <div class="form-group">
  <input placeholder="address"  type="text" wire:model="address" class="form-control"  required>
</div>

<div class="form-group">
<input placeholder="phone number"  type="text" wire:model="phoneNo" class="form-control" required >
</div>

<div>
<div class="form-group">
    <label for="exampleFormControlSelect1"></label>
    <select wire:model="product" class="form-control browser-default" aria-label="Default select example">
  <option selected  >select category</option>
  @foreach($categories as $subcategory)
            <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
            @endforeach
</select>
  </div>
  </div>

@if($subCategories)
<div >
<div class="form-group">
    <label for="exampleFormControlSelect1"></label>
    <select wire:model="productselected" class="form-control browser-default" aria-label="Default select example" required>
  <option selected  >select product</option>
  @foreach($subCategories as $subcategory)
            <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
            @endforeach
</select>
  </div>
  </div>
  @endif

@if($available)


<div class="form-group">
<label class="red-text"><b>{{$available->quantity}} of selected item available @ K{{$available->priceSold}}</b></label>
<input min="1" placeholder="quantity"  type="number" wire:model="quantity" class="form-control" required>
</div>

@if($quantity)

<div class="form-group">
<label class="">Total.</label>
<input placeholder="ZMW {{$quantity * $available->priceSold}}" disabled type="number"  class="form-control"  >
</div>

@endif

  @endif

<div class="form-group">
<label>Date placed</label>
<input placeholder="date placed"  type="date" wire:model="dateplaced" class="form-control" required>
</div>


<div class="form-group">
<label>Due date</label>
<input placeholder="date due"  type="date" wire:model="duedate" class="form-control" required>
</div>




<button style="border-radius:10px;" type="submit"  class="btn blue ">Add</button>


</form>
</div>
</div>



<script>

window.addEventListener('laybuy-added', event => {
  M.toast({html: 'laybuy added successfully'});
});

window.addEventListener('excess-quantity', event => {
  M.toast({html: 'quantity entered is greater than current stock available'});
});



</script>


</div>
