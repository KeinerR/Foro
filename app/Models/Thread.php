<?php

namespace App\Models;

use App\Models\Category\Category;
use App\Models\Reply\Reply;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Thread extends Model
{
    /** @use HasFactory<\Database\Factories\ThreadFactory> */
    use HasFactory;

    protected $fillable =[
      'category_id',
      'user_id',
      'title',
      'content',


    ];


    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function  category():BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function replies():HasMany{
        return $this->hasMany(Reply::class);
    }
}
