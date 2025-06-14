<?php

namespace App\Livewire\Show;

use App\Models\Thread;
use Livewire\Component;

class ShowThread extends Component
{

    public Thread $threads;
    public $body;

    public function postReply(){

        //validdate
        $this->validate(['body'=>'required']);
        //create
        auth()->user()->replies()->create([
         'thread_id'=>$this->threads->id,
         'content' =>$this->body,
        ]);
        //refres
        $this->body="";
        $this->dispatch('replyAdded');

    }
 

    public function render()
    {
        return view('livewire.show.show-thread',[
            'replies'=>$this->threads
            ->replies()
            ->whereNull('reply_id')
            ->with(['user','replies.user' ,'replies.replies'])
            ->get(),
        ]);
    }
}
