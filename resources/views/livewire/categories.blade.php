<div>



    
<div class="container">
<div class="row">

<div style="height:10px"></div>

<div class="col m6">
    <form wire:submit.prevent="save" class="form-inline">

  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only">New Category</label>
    <input placeholder="new category" type="text" wire:model="name" class="form-control" value="">
  </div>
  <button type="submit" class="btn btn-small blue">add </button>
</form>
</div>
</div>
    </div>




<div style="height:10px"></div>


  <div class="container">
  <div class="container">


 

  
<div style="height:40px"></div>


<h4 style="font-family: 'Unica One', cursive; font-size:;" class="fw-lighter">
      <b>ALL CATEGORIES</b>
      </h4>

      <div style="height:20px"></div>

    <table style="border-radius:20px; padding:20px;" class="card-panel highlight responsive-table centered">
        <thead>
          <tr>
               <th>#</th>
              <th>Name</th>
              <th>Action</th>
             
             
          </tr>
        </thead>

        <tbody>
        @foreach ($categories as $key => $category)
          <tr>
          <td>{{++$key}}</td>
            <td>{{$category->name}}</td>
           
            <td> <a onclick="sure('{{$category->id}}')" style="cursor:pointer;" class=""><i class="red-text material-icons">clear</i></a></td>
            
          </tr>
      @endforeach

 
  
        </tbody>
      </table>
</div>
</div>





  <script>

window.addEventListener('category-added', event => {
  M.toast({html: 'category added successfully'});
});



window.addEventListener('category-deleted', event => {
  M.toast({html: 'category deleted successfully'});
});


function sure($category){

  let proceed = confirm("Are you sure you want to delete?");

if (proceed) {
     window.livewire.emit('deleteCategory', $category)
} else {
  
}
}


</script>

</div>
