<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employee extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'department_id',
        'employee_number',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function departmentHistories()
    {
        return $this->hasMany(DepartmentHistory::class);
    }

    public function isLeader()
    {
        return $this->id === $this->decrement->leader_id;
    }

    public function isHRleader()
    {
        return $this->isLeader() && $this->decrement->name === '総務'; 
    }

    public function canEditEmployees()
    {
        return $this->isHRleader();
    }

    public function getAuthIdentifierName()
    {
        return 'employee_number';
    }

}
