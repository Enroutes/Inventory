<div>
    

<span class="grey-text"> choose product</span>

<div style="height:5px;"></div>

  <div  class="form-group">

  <p style="display:inline">
  @foreach($subCategories as $subCategory)
      <label>
        <input name="subcategory" wire:click="setName('{{$subCategory->productName}}')" type="radio" />
        <span>{{$subCategory->productName}}</span>
      </label>

      @endforeach
    </p>






  </div>

  <hr>
</div>
