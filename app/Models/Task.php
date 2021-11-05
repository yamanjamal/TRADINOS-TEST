<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'deadline',
        'end_flag',
        'user_id',
        'assign',
    ];


    public function SubTasks()
    {
        return $this->hasMany(SubTask::class);
    }


    public function Categories(){

        return $this->belongsToMany(Categories::class,'categorie_tasks','task_id','categorie_id');
    }
}
