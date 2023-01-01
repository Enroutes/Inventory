<div>

@can('isSuperadmin')

<div style="height:70px"></div>


<div class="container">
<div class="row">

<div class="col m6">
<h4 style="font-family: 'Unica One', cursive; font-size:;" class="text-center fw-lighter">
      <b>ADD NEW USER</b>
      </h4>
</div>


<div class="col m6">
@if(Auth::user()->usertype === 'superadmin')

<a style="margin-top:24px;" class="btn white black-text right" href="/allmembers">view all members</a>

@endif
</div>


      </div>


<div style="height:10px"></div>

  <form wire:submit.prevent="save" style="border-radius:10px; padding:20px;" class="card-panel">

 

  <div  class="form-group">
    <label for="">Select Shop</label>
    <select style="border-bottom: 1px solid #ccc;" wire:model="shopId" class="form-control browser-default"  required>
  <option style="color:grey; display:none;" selected  >select name</option>
  @foreach($shops as $shop)
            <option  value="{{$shop->id}}">{{$shop->name}}</option>
            @endforeach
</select>

@if($errors->has('shopId'))
            <p class="red-text">{{$errors->first('shopId')}}</p>
            @endif

  </div>


  <div class="form-group">
    <label for="">select usertype</label>
    <select style="border-bottom: 1px solid #ccc;" wire:model="usertype" class="form-control browser-default" required>

  <option style="color:grey; display:none;" selected>select usertype</option>
  <option value="ordinary">Ordinary</option>
  <option value="admin">Admin</option>
  <option value="superadmin">Super Admin</option>
</select>

@if($errors->has('usertype'))
            <p class="red-text">{{$errors->first('usertype')}}</p>
            @endif
  </div>


  <div class="form-group">
  <input placeholder="name"  type="text" wire:model="name" class="form-control" required>
  @if($errors->has('name'))
            <p class="red-text">{{$errors->first('name')}}</p>
            @endif
  </div>

  <div class="form-group">
  <input placeholder="email"  type="email" wire:model="email" class="form-control" required>
  @if($errors->has('email'))
            <p class="red-text">{{$errors->first('email')}}</p>
            @endif
</div>

<div class="form-group">
<input required placeholder="password"  type="password" wire:model="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
@if($errors->has('password'))
            <p class="red-text">{{$errors->first('password')}}</p>
            @endif
</div>


<button type="submit"  class="btn blue">Add</button>


</form>

@endcan

@can('isAdmin')
<h1 class="red-text center">Not authorized to view page</h1>
@endcan


@can('isOrdinary')
<h1 class="red-text center">Not authorized to view page</h1>
@endcan

</div>

<script>


window.addEventListener('user-added', event => {
  M.toast({html: 'user added to team successfully'});
});



</script>


</div>
