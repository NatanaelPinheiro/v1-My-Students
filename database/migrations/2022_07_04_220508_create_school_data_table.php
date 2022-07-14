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
        Schema::create('school_data', function (Blueprint $table) {
            $table->id();
            $table->string('school_name');
            $table->string('school_principal');
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->string('school_phone');
            $table->string('national_position');
            $table->string('avarage_score');
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
        Schema::dropIfExists('school_data');
    }
};
