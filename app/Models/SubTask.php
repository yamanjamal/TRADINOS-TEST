<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubTask extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'task_id',
    ];

    public function Task()
    {
        return $this->belongsTo(Task::class);
    }

}
