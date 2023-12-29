<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    const STATUS_CREATED = 'created';
    const STATUS_ASSIGNED = 'assigned';
    const STATUS_IN_PROGRESS = 'in_progress';
    const STATUS_COMPLETE = 'complete';

    protected $fillable=['user_id','title','description','status'];

    protected static function boot()
    {
        parent::boot();
        // Set default status as 'created' before saving a new model
        static::creating(function ($task) {
            $task->status = self::STATUS_CREATED;
        });
    }
}
