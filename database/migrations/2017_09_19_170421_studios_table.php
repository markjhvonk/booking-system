<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StudiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longtext('info');
            $table->longtext('specs');
            $table->string('cover_photo');
            $table->string('location');
            $table->boolean('assistance');
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
        //
    }
}
