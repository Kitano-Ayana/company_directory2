<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory; 

    protected $fillable = [
        'name',
        'leader_id'
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function leader()
    {
        return $this->belongsTo(Employee::class,'leader_id');
    }
}
