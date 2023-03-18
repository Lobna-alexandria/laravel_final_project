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
        Schema::create('creative__work_images', function (Blueprint $table) {
            $table->id();
            $table
                ->string('image', 100)
                ->nullable()
                ->default('default.png');
            $table
                ->string('desc', 100)
                ->nullable()
                ->default('text');
            $table
                ->foreignId('crwork_id')
                ->constrained('creative_works', 'id')
                ->onDelete('cascade');
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
        Schema::dropIfExists('creative__work_images');
    }
};