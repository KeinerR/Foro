<?php

namespace App\Services;

use App\Models\Thread;

class ThreadServices
{
    public function update(array $data, $thread):bool
    {
        // Opción 1: Si tienes una instancia específica (recomendado)
        // Asume que el array tiene un 'id'
       
        return $thread->update($data);
    }

    public function create($data){
  

        $data['user_id'] = auth()->id();
     

   
         $dataCreated = Thread::create($data->all());
           
         return $dataCreated;
    }
}
