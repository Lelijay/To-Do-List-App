<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    /** @use HasFactory<\Database\Factories\TasksFactory> */
    use HasFactory;

    // protected $table = "tasks";
    // In your Tasks model
    protected $fillable = ['title', 'description', 'deadline', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
