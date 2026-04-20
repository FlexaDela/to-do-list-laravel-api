<?php

namespace App\Models;

use Database\Factories\TaskFactory;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

#[UseFactory(TaskFactory::class)]
class Task extends Model
{
    /** @use HasFactory<TaskFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'status',
        'checked',
        'description'
    ];

    protected static function booted()
    {
        self::addGlobalScope('ordered', function(Builder $builder){
            $builder->orderBy('created_at','asc');
        });
    }
    /*
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    */
}
