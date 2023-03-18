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
        Schema::table('user_abouts', function (Blueprint $table) {
            $table
                ->string('address', 100)
                ->nullable()
                ->default('text');
            $table
                ->string('mail', 100)
                ->nullable()
                ->default('text');
            $table
                ->string('mediaIcon', 100)
                ->nullable()
                ->default('default.png');
            $table
                ->string('image1', 100)
                ->nullable()
                ->default('default.png');
            $table
                ->string('image2', 100)
                ->nullable()
                ->default('default.png');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_abouts', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->dropColumn('mail');
            $table->dropColumn('mediaIcon');
            $table->dropColumn('image1');
            $table->dropColumn('image2');
        });
    }
};