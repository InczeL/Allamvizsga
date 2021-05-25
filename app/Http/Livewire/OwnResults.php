<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Result;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class OwnResults extends Component
{
    public $results;
    public function mount(){
        $this->results = DB::table('users')->join('results','users.id',"=",'results.user_id')
        ->join('tasks','results.task_id',"=",'tasks.task_id')
        ->where('results.user_id',session()->get('LoggedUser')->id)
        ->get();
    }
    public function render()
    {
        return view('livewire.own-results');
    }
}
