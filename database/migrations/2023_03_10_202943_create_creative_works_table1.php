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
        Schema::create('creative_works', function (Blueprint $table) {
            $table->id();
            $table
                ->string('name', 100)
                ->nullable()
                ->default('text');
            $table
                ->string('desc', 100)
                ->nullable()
                ->default('text');
            $table->timestamps();
            //    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('creative_works');
    }
};