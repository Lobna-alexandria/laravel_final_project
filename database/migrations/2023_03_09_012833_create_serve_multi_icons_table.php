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
        Schema::create('serve_multi_icons', function (Blueprint $table) {
            $table->id();
            $table
                ->string('linkname', 100)
                ->nullable()
                ->default('text');
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
        Schema::dropIfExists('serve_multi_icons');
    }
};