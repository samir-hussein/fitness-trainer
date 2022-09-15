<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('age');
            $table->string('gender');
            $table->string('height');
            $table->string('weight');
            $table->string('sleep');
            $table->string('wake_up');
            $table->string('go_work');
            $table->string('go_home');
            $table->string('training_at');
            $table->text('goal');
            $table->text('supplement');
            $table->text('another_sport');
            $table->text('problems');
            $table->string('front_body')->nullable();
            $table->string('back_body')->nullable();
            $table->string('bill');
            $table->string('service');
            $table->string('status');
            $table->date('start')->nullable();
            $table->date('end')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
