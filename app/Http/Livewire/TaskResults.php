<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Result;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TaskResults extends Component
{
    public $results;
    public $task_id;
    public $score = 0;
    public function mount(){
        $this->results = DB::table('users')->join('results','users.id',"=",'results.user_id')
        ->where('results.task_id',$this->task_id)
        ->where('results.score','>=',$this->score)
        ->get();
        
    }
    public function render()
    {
        return view('livewire.task-results');
    }
}
