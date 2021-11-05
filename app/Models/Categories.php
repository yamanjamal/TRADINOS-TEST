<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'color',
    ];

    // public $table = "categories";

    public function Tasks()
    {
        return $this->belongsToMany(Task::class,'categorie_tasks','categorie_id','task_id');
    }

}
