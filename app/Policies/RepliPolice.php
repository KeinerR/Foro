<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Reply\Reply;


class RepliPolice
{
    
     public function update(User $user, Reply $reply)
    {
        return $user->id === $reply->user_id;
    }
}
