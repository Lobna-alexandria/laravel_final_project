<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_abouts', function (Blueprint $table) {
            $table->id();
            $table->string('main_title', 150)->nullable()->default('text');
            $table->string('title', 100)->nullable()->default('text');
            $table->string('desc', 250)->nullable()->default('text');
            $table
            ->string('image', 100)
            ->nullable()
            ->default('default.png');
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
        Schema::dropIfExists('user_abouts');
    }
};