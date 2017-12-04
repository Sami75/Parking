<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membre', function (Blueprint $table) {
	    $table->increments('id');
            $table->string('user', 50);
            $table->string('nom', 50);
	    $table->string('prenom', 50);
	    $table->string('mail', 50);
	    $table->integer('tel');
	    $table->string('pwd');
	    $table->boolean('admin');
	    $table->string('rang')->unique;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('membre');
    }
}
