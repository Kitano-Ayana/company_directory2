<?php

namespace App\Services;

use App\Models\Department;
use App\Models\Employee;
use Exception;


class DepaermentService
{

    public function changeLeader(Department $department,Employee $newLeader)
    {
        if($newLeader->department->id !== $department->id){
            throw new Exception('新リーダーは部署の一員でなければなりません');
        }

        $department->leader_id = $newLeader->id;
        $department->save();
    }
}