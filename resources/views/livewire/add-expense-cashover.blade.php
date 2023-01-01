<div>
    
   
            <div style="margin-bottom:5px;" class="col m6 right">
            <label for="">Add expenses & cash over </label>

                    <form wire:submit.prevent="save" class="form-inline">

                   

                    <div class="col m5">
                    <input min="0"  placeholder="expense" type="number" wire:model="expense" class="form-control" value="">
                    </div>

                    <div class="col m5">
                    <input min="0"  placeholder="cashover" type="number" wire:model="cashover" class="form-control" value="">
                    </div>



                    <div class="col m2">
                    <button style="margin:8px" type="submit" class="btn btn-dark mb-2">add</button>
                    </div>



                    </form>
        </div>



        <script>

window.addEventListener('expense-added', event => {
  M.toast({html: 'expenses & cash over added successfully'});
});


window.addEventListener('expense-updated', event => {
  M.toast({html: 'expenses & cash over updated successfully'});
});


</script>


</div>
