<div>
    
 
<div class="container">

<div style="height:20px"></div>

<h4 style="font-family: 'Unica One', cursive; font-size:;" class="center">
      <b>STOCK AVAILABLE </b>
      </h4>

      <div style="height:30px"></div>

  
      <div class="row">
      <div class="col m6">

      <div class="form-group">
          <label for="exampleFormControlSelect1"></label>
          <select style="border-radius:20px; border-color:#ccc;" wire:model="category" class="form-control browser-default" aria-label="Default select example">
        <option selected  >select category</option>
        @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
      </select>
        </div>
      
      </div>

      <div class="col m6">
      

      
      </div>
      </div>

      <div style="height:20px"></div>

@if($category)


<div class="card-panel z-depth-4" style="border-radius:20px; padding:20px;">
<table class="highlight responsive-table centered">
  <thead>
    <tr>
      <th>#</th>
      <th scope="col">Brand Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Cost Price</th>
      <th scope="col">Selling Price</th>
      @can('isSuperadmin')
      <th scope="col">Action</th>
      @endcan
    </tr>
  </thead>
  <tbody>

  @foreach($stocks as $key => $stock)
    <tr>
       <td>{{++$key}}</td>
      <td>{{$stock->name}}</td>
      <td>{{$stock->quantity}}</td>
      <td>{{$stock->priceBought}}</td>
      <td>{{$stock->priceSold}}</td>
      @can('isSuperadmin')
      <td><a wire:click="edit({{$stock->id}})" class="btn btn-floating black"><i class="material-icons">edit</i></a> <a onclick="sure('{{$stock->id}}')" class="btn btn-floating black darken-2"><i class="material-icons">delete_sweep</i></a></td>
      @endcan
    </tr>
    @endforeach

  </tbody>
</table>
</div>

@endif
</div>


@livewire('update-stock-available')




<script>


window.addEventListener('stock-deleted', event => {
  M.toast({html: 'stock record deleted successfully'});
});



function sure($stockId){

let proceed = confirm("Are you sure you want to delete?");

if (proceed) {
   window.livewire.emit('deleteStock', $stockId)
} else {

}
}

</script>

</div>
