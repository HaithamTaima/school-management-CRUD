<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftDeleteToStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->unsignedBigInteger('department_id')
                ->after('date_of_birth')
                ->nullable();
            $table->softDeletes();
            $table->foreign('department_id')
                ->on('departments')
                ->references('id')->onDelete('cascade');
//            $table->bigInteger()->unsigned();
        });

    }

    /**
     * Reverse the migrations.
     * php artisan make:migration add_soft_delete_to_teachers_table --table=teachers

     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            //
        });
    }
}
