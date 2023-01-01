<div>


<div style="height:20px"></div>

<div class="container">
<div class="card-panel z-depth-4" style="border-radius:20px; padding:20px;">

<table class="highlight responsive-table centered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Fullname</th>
      <th scope="col">Address</th>
      <th scope="col">PhoneNo</th>
      <th scope="col">Product</th>
      <th scope="col">Category</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Date placed</th>
      <th scope="col">Due date</th>
      <th scope="col">Balance</th>
  
    </tr>
  </thead>
  <tbody>

@foreach($laybuys as $key => $laybuy)
    <tr>
       <td>{{++$key}}</td>
       <td>{{$laybuy->fullname}}</td>
       <td>{{$laybuy->address}}</td>
       <td>{{$laybuy->phoneNo}}</td>
       <td>{{$laybuy->product}}</td>
       <td>{{$laybuy->category}}</td>
       <td>K{{$laybuy->price}}</td>
       <td>{{$laybuy->quantity}}</td>
       <td>{{$laybuy->dateplaced}}</td>
       <td>{{$laybuy->duedate}}</td>
       <td>K{{$laybuy->balance}}</td>


      
    </tr>
@endforeach



  </tbody>
</table>

</div>
</div>






</div>
