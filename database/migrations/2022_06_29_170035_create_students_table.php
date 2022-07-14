<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('cpf');
            $table->date('birth_date');
            $table->string('gender');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('country');
            $table->string('address');
            $table->string('city');
            $table->string('email_address');
            $table->string('student_phone');
            $table->string('emergency_phone');

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
        Schema::dropIfExists('students');
    }
};
