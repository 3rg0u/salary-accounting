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
        Schema::create('professors', function (Blueprint $table) {
            $table->id();
            $table->string('pid')->unique()->nullable(false);
            $table->string('fullname')->nullable(false);
            $table->string('falculty')->nullable(true);
            $table->foreign('falculty')->references('abbreviation')->on('falculties')->nullOnDelete()->cascadeOnUpdate();
            $table->string('email')->nullable(true);
            $table->foreign('email')->references('email')->on('users')->nullOnDelete()->cascadeOnUpdate();
            $table->string('refs')->nullable(true);
            $table->foreign('refs')->references('abbreviation')->on('degrees')->nullOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professors');
    }
};
