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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150);
            $table->unsignedBigInteger('user_id');

            // Per creazione rapporto One to Many
            // $table->unsignedBigInteger('category_id');
            
            $table->text('body');
            $table->timestamps();

            // vincolo per evitare errori, tipo richiami a id che non ci sono ma non è obbligatorio
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
