<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained();
            $table->foreignId('employee_id')->constrained();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('department_histories');
    }
}
