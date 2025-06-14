<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThreadRequest;
use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\Category;
use App\Models\Category\Category as CategoryCategory;
use App\Services\ThreadServices;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ThreadController extends Controller
{
    use AuthorizesRequests; // <-- Añade este trait


    public $threadServices;

    public function __construct(ThreadServices $threadServices)
    {
        
        $this->threadServices = $threadServices;
    }


    public function create(Thread $thread){
     
        $categories = CategoryCategory::all();


        return view('thread.create',compact('categories', 'thread'));
    }

     public function store(Request $request){
        
        $this->threadServices->create($request);
        return redirect()->route('dashboard');

      
    }
    public function  edit(Thread $thread){
     
        $categories = CategoryCategory::all();

        return view('thread.edit',compact('categories', 'thread'));
    }

    public function update(ThreadRequest $request,Thread $thread){
        //  $thread = Thread::findOrFail($id);
      
    
    // 2. Luego autoriza
  
    
    $this->authorize('update', $thread);
        $this->threadServices->update($request->validated(), $thread);
        return redirect()->route('dashboard');
    }

    
}
