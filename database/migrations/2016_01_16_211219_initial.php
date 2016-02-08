<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Initial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function(Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->integer('rating')->default(0);
            $table->boolean('approved');
            $table->boolean('flagged')->default(FALSE);
            $table->timestamp('created')->default(DB::raw('CURRENT_TIMESTAMP'));
        });

        Schema::create('news', function(Blueprint $table) {
            $table->increments('id');
            $table->string('content');
            $table->timestamp('created')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('quotes');
        Schema::drop('news');
    }
}
