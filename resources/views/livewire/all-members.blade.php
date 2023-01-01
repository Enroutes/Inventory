<div>
<div style="height:20px"></div>


<div class="container">

<a class="btn btn-floating red " href="/addmembers"><i class="material-icons">arrow_back</i></a>

<div style="height:30px"></div>


     


<h4 style="font-family: 'Unica One', cursive; font-size:;" class="text-center fw-lighter">
      <b>ALL MEMBERS</b>
      </h4>

      <div style="height:20px"></div>


<table style="border-radius:20px; padding:20px;" class="highlight responsive-table centered card-panel">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Shop</th>
      <th scope="col">Usertype</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>

  @foreach($members as $key => $member)
    <tr>
    <td>{{++$key}}</td>
      <td>{{$member->name}}</td>
      <td>{{$member->shopName}}</td>
      <td>{{$member->usertype}}</td>
      <td><a style="cursor:pointer" class="" onclick="sure('{{$member->id}}')" ><i class="red-text material-icons">clear</i></a></td>
  
    </tr>
    @endforeach





  </tbody>
</table>




</div>


<script>
function sure($userId){

let proceed = confirm("Are you sure you want to delete?");

if (proceed) {
   window.livewire.emit('deleteUser', $userId)
} else {

}
}

</script>

</div>
