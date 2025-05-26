<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->nullable(false);
            $table->string('name')->unique()->nullable(false);
            $table->string('falculty')->nullable(true);
            $table->foreign('falculty')->references('abbreviation')->on('falculties')->nullOnDelete()->cascadeOnUpdate();
            $table->double('coeff')->nullable(true);
            $table->smallInteger('cls_hours')->nullable(false);
            $table->smallInteger('cred_hours')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
