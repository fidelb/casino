<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();            
            $table->unsignedBigInteger('player_id')->nullable();
            $table->integer('dau1');
            $table->integer('dau2');
            $table->boolean('guanyada')->nullable();  
            $table->timestamp('data')->nullable();          
            $table->timestamps();

            $table->foreign('player_id')->references('id')->on('players')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
