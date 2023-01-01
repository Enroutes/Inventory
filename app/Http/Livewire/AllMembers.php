<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth;

class AllMembers extends Component
{


    protected $listeners = [
        
        'deleteUser',
    ];


    

    public function deleteUser($id){

        $user = User::find($id);
        $user->delete();
 
     }

     

    public function render()
    {

        $members = DB::table('users')
         ->where('users.shopId', Auth::user()->shopId)
         ->get();


        return view('livewire.all-members',[
            'members' => $members
        ]);
    }
}
