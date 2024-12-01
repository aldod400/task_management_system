<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'completed',
        'due_date',
        'priority',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
