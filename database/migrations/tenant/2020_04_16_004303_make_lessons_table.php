<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('lessons');
        Schema::create('lessons', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('lesson_title', 300)->nullable();
            $table->text('lesson_description');
            $table->string('lesson_ttile', 300)->nullable();
            
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
        Schema::dropIfExists('lessons');
    }
}
