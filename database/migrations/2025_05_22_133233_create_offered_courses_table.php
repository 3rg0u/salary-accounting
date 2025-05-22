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
        Schema::create('offered_courses', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->nullable(false);
            $table->string('course_code')->nullable(true);
            $table->foreign('course_code')->references('code')->on('courses')->nullOnDelete()->cascadeOnUpdate();
            $table->string('sem_code')->nullable(true);
            $table->foreign('sem_code')->references('code')->on('semesters')->nullOnDelete()->cascadeOnUpdate();
            $table->string('prof_id')->nullable(true);
            $table->foreign('prof_id')->references('pid')->on('professors')->nullOnDelete()->cascadeOnUpdate();
            $table->smallInteger('std_nums')->nullable(false);
            $table->double('coeff')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offered_courses');
    }
};
