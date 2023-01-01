<div>

@if($active)
<div class="container">




<div class="row container">



<div style="height:20px;"></div>


    <form wire:submit.prevent="save" style="border-radius:15px; padding:15px;" class="col s12 card-panel z-depth-5">
      <div class="row">
        <div class="input-field col s12">
          <input placeholder="name" id="name" type="text" wire:model="name" class="validate" value="{{$name}}">
        
        </div>
 
      </div>


      <div class="row">
        <div class="input-field col s12">
          <input placeholder="amount" id="amount" type="number" wire:model="amount" class="validate" value="{{$amount}}">
          
        </div>
 
      </div>
    
   
    <button type="submit" style="border-radius:10px;" class="btn blue">update</button>
    
    </form>
  </div>
 

  </div>
  @endif



  <script>

    window.addEventListener('expense-updated', event => {
      M.toast({html: 'expense updated successfully'});
  });
  
</script>


</div>
