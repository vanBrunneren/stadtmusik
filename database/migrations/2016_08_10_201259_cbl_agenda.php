<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CblAgenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cbl_agenda', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('date');
            $table->text('name');
            $table->text('location');
            $table->integer('category_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cbl_agenda', function (Blueprint $table) {
            //
        });
    }
}
