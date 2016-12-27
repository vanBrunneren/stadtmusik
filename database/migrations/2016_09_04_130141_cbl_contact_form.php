<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CblContactForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cbl_contact_form', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->text('prename');
            $table->text('name');
            $table->text('email');
            $table->text('subject');
            $table->text('text');
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
        Schema::table('cbl_contact_form', function (Blueprint $table) {
            //
        });
    }
}
