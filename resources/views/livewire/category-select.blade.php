<div>
<form wire:submit.prevent="saveSubcategory" class="form-inline">

<div class="col m6">

<input placeholder="new product name" type="text" wire:model="addSubcategory" class="form-control" value="">
</div>


<div class="col m6">
<button  style="margin-top:18px"  type="submit" class="btn white black-text btn-small">add</button>
</div>



</form>


<script>
        window.addEventListener('subcategory-added', event => {
  M.toast({html: 'product added successfully'});
});

</script>


</div>
