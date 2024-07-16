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
        Schema::create('user_favorite_gifts', function (Blueprint $table) {
            $table->id();
            $table->string('gift_id');
            $table->string('alias');
            $table->unsignedBigInteger('user_id');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('user_favorite_gifts', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_favorite_gifts');
    }
};
