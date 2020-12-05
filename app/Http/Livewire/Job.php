<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Job extends Component
{
    public $job;

    public function addLike()
    {
        if(auth()->check()){
            auth()->user()->likes()->toggle($this->job->id);
        }
        //Todo error message
        
    }

    public function render()
    {
        return view('livewire.job');
    }
}
