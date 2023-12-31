<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    const STATUS_CREATED = 'created';
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

    public function getStatusTitleAttribute(): string
    {
        $status = $this->attributes['status'] ?? null;

        return match ($status) {
            self::STATUS_CREATED => 'Created',
            self::STATUS_IN_PROGRESS => 'In Progress',
            self::STATUS_COMPLETE => 'Complete',
            default => 'Unknown',
        };
    }
}
