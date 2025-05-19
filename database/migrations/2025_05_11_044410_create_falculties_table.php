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
        Schema::create('falculties', function (Blueprint $table) {
            $table->id();
            $table->string('fullname')->nullable(false)->unique();
            $table->string('abbreviation')->nullable(false)->unique();
            $table->text('description')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('falculties');
    }
};
