<div>


<div style="height:20px"></div>


<div class="container">

<h4 style="font-family: 'Unica One', cursive; font-size:;" class="text-center fw-lighter">
      <b>ADD TO STOCK</b>
      </h4>

      </div>


<div style="height:10px"></div>



<div class="container">

<div class="row">

<div >



  <div class="row">


<div class="input-field col m6 s12">
<select style="border-radius:20px;" wire:model="setCategory" class="browser-default ">
  <option style="text-indent:10px; color:grey;" selected>Select product Category</option>
  <hr>
  @foreach($categories as $category)
  <option value="{{$category->id}}">{{$category->name}}</option>
  @endforeach
</select>

</div>




<div class="col m6">
@if($setCategory)
@livewire('category-select')

@endif
  </div>




</div>

  </div>

</div>
</div>



<div style="height:10px;"></div>



 


<div  class="container">

<div  class="row">
  <form style="border-radius:10px; padding:20px;" class="col m6 card-panel z-depth-4" wire:submit.prevent="save" >

 
<div class="form-group">

<label for="">Select Product</label>
    <select style="border-bottom: 1px solid #ccc;" wire:model="name" class="form-control browser-default"  required>
  <option style="color:grey; display:none;" selected>select product</option>
  @foreach($subCategories as $subCategory)
            <option  wire:click="setName('{{$subCategory->productName}}')">{{$subCategory->productName}}</option>
            @endforeach
</select>

</div>

  <div class="form-group">
  <input min="1" placeholder="price ordered"  type="number" wire:model="priceOrdered" class="form-control" >
  </div>

  <div class="form-group">
  <input min="1" placeholder="selling price"  type="number" wire:model="sellingPrice" class="form-control">
</div>

<div class="form-group">
<input min="1" placeholder="quantity"  type="number" wire:model="quantity" class="form-control">
</div>


<button style="border-radius:10px" type="submit"  class="btn blue">Add</button>


</form>

</div>
</div>


  </div>
</div>





  <script>

window.addEventListener('stock-added', event => {
  M.toast({html: 'stock added successfully'});
});



</script>



</div>
</div>