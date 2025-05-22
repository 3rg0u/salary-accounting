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
        Schema::create('semesters', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->nullable(false);
            $table->string('aca_year')->nullable(true);
            $table->foreign('aca_year')->references('code')->on('academic_years')->nullOnDelete()->cascadeOnUpdate();
            $table->dateTime('start')->nullable(false);
            $table->dateTime('end')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('semesters');
    }
};
