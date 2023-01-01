<div>
@can('isSuperadmin')

@if($active)
<div class="container">




<div class="row">



<div style="height:20px;"></div>


    <form wire:submit.prevent="save" style="border-radius:15px; padding:15px;" class="col s12 card-panel z-depth-5">

      <div class="row">
        <div class="input-field col s12">
          <input placeholder="name" id="name" type="text" wire:model="name" class="validate" value="{{$name}}">
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <input placeholder="quantity"  type="number" wire:model="quantity" class="validate" value="{{$quantity}}">
        </div>
      </div>


      <div class="row">
        <div class="input-field col s12">
          <input placeholder="cost price" type="number" wire:model="costPrice" class="validate" value="{{$priceBought}}">
        </div>
      </div>


      <div class="row">
        <div class="input-field col s12">
          <input placeholder="selling price"  type="number" wire:model="sellingPrice" class="validate" value="{{$priceSold}}">
        </div>
      </div>
    
   
    <button type="submit" style="border-radius:10px;" class="btn blue">update</button>
    
    </form>
  </div>
 

  </div>
  @endif

@endcan

  <script>

    window.addEventListener('stock-updated', event => {
      M.toast({html: 'stock updated successfully'});
  });
  
</script>


</div>
