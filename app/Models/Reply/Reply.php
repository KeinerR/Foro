<?php

namespace App\Models\Reply;

use App\Models\Thread;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reply extends Model
{
    /** @use HasFactory<\Database\Factories\Reply\ReplyFactory> */
    use HasFactory;

    protected $fillable =[
        'thread_id',
        'reply_id',
        'content',
    ];
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function replies():HasMany{
        return $this->hasMany(Reply::class);
    }
     public function thread():BelongsTo{
        return $this->belongsTo(Thread::class);
    }
}
