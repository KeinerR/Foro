<?php

namespace App\Livewire;

use App\Models\Reply\Reply;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use function PHPUnit\Framework\isNull;

class ShowReply extends Component
{

    public Reply $reply;
    public $body;
    public $is_creating = false;
    public $is_editing = false;
    
    public function updatedIsEditing(){
        $this->body = $this->reply->content;
        $this->is_creating = false;
    }
     public function updatedIsCreating(){
        $this->body = '';
        $this->is_editing = false;
    }

     public function postChiald(){

        if (!is_null($this->reply->reply_id)) return;
        $this->validate(['body'=>'required']);
        //create
        auth()->user()->replies()->create([
         'thread_id'=>$this->reply->thread->id,
        'reply_id'=>$this->reply->id,

         'content' =>$this->body,
        ]);
        //refres
        $this->body="";
        $this->dispatch('replyAdded');
        $this->is_creating = false;

    }

    public function updatePost(){

         $this->authorize('update', $this->reply);
        $this->validate(['body'=>'required']);
        //create
        $this->reply->update(['content' =>$this->body,]);
        //refres
        $this->body="";
        $this->dispatch('replyAdded');
        $this->is_editing = false;

    }

    public function render()
    {
        return view('livewire.show-reply');
    }
}
