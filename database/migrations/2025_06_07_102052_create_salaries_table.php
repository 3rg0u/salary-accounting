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
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->string('year_code')->nullable(true);
            $table->foreign('year_code')->references('code')->on('academic_years')->nullOnDelete()->cascadeOnUpdate();
            $table->string('sem_code')->nullable(true);
            $table->foreign('sem_code')->references('code')->on('semesters')->nullOnDelete()->cascadeOnUpdate();
            $table->string('prof_id')->nullable(true);
            $table->foreign('prof_id')->references('pid')->on('professors')->nullOnDelete()->cascadeOnUpdate();
            $table->string('cls_code')->nullable(true);
            $table->foreign('cls_code')->references('code')->on('offered_courses')->nullOnDelete()->cascadeOnUpdate();
            $table->double('amount')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salaries');
    }
};
