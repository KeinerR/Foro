<?php

namespace App\Models\Category;

use App\Models\Thread;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\Category\CategoryFactory> */
    use HasFactory;

    public function threads():HasMany{
        return $this->hasMany(Thread::class);
    }
}
