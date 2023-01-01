<div>


@if($viewEntryForm)

<div style="height:60px;"></div>

<div class="container">


<div class="row ">

<button wire:click="viewTable()" class="btn blue">View Expenses</button>

<div style="height:20px;"></div>


    <form wire:submit.prevent="save" style="border-radius:15px; padding:15px;" class="col s12 card-panel z-depth-5">
      <div class="row">
        <div class="input-field col s12">
          <input placeholder="name" id="name" type="text" wire:model="name" class="validate" required>
        
        </div>
 
      </div>


      <div class="row">
        <div class="input-field col s12">
          <input min="1" placeholder="amount" id="amount" type="number" wire:model="amount" class="validate" required>
          
        </div>
 
      </div>
    
   
    <button type="submit" style="border-radius:10px;" class="btn blue">Add</button>
    
    </form>
  </div>
  </div>

 

  @endif




@if($viewExpenseTable)

<div style="height:60px;"></div>
  <div class="container">
  <div class="container">
  <button wire:click="hideTable()" class="btn btn-floating blue"><i class="material-icons">arrow_back</i></button>

  <div style="height:20px;"></div>

    <table style="border-radius:10px;" class="card-panel centered responsive striped z-depth-5 responsive">
        <thead>
          <tr>
              <th>Name</th>
              <th>Amount</th>
              <th>Date</th>
             
          </tr>
        </thead>

        <tbody>
        @foreach ($expenses as $expense)
          <tr>
            <td>{{$expense->name}}</td>
            <td>K{{$expense->amount}}</td>
            <td>{{ $expense->created_at->format('d-m-Y ')}}</td>
            <td><a wire:click="edit({{$expense->id}})" class="btn btn-floating black"><i class="material-icons">edit</i></a> <a wire:click="delete({{$expense->id}})" class="btn btn-floating black darken-2"><i class="material-icons">delete_sweep</i></a></td>
            
          </tr>
      @endforeach

 
  
        </tbody>
      </table>
</div>
</div>


<div style="height:20px"></div>

@livewire('update-expense')





@endif

  <script>

window.addEventListener('payment-added', event => {
  M.toast({html: 'payment added successfully'});
});

</script>

</div>
