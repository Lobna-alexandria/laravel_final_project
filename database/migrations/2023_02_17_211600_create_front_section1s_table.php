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
        Schema::create('front_section1s', function (Blueprint $table) {
            $table->id();
            $table
                ->string('main_title', 300)
                ->nullable()
                ->default('text');
            $table
                ->string('title', 300)
                ->nullable()
                ->default('text');
            $table
                ->string('btn_name', 100)
                ->nullable()
                ->default('text');
            $table
                ->string('image', 100)
                ->nullable()
                ->default('default.png');
            $table
                ->string('video', 100)
                ->nullable()
                ->default('https://youtu.be/sEO6VXJbSxo');
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
        Schema::dropIfExists('front_section1s');
    }
};
