<?php

namespace App\Livewire\Show;

use App\Models\Thread;
use Livewire\Component;

class ShowThread extends Component
{

    public Thread $threads;
 

    public function render()
    {
        return view('livewire.show.show-thread');
    }
}
