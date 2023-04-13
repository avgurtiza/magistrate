<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('map_state', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('game_id');
            // $table->unsignedBigInteger('world_id');
            $table->unsignedBigInteger('map_id');
            $table->json('metadata');
            $table->timestamps();

            // $table->foreign('game_id')->references('id')->on('games');
            // $table->foreign('world_id')->references('id')->on('worlds');
            // $table->foreign('map_id')->references('id')->on('maps');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('map_state');
    }
};
