<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevoirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devoirs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('formation_id');
            $table->foreign('formation_id')->references('id')->on('formations');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('intitule');
            $table->string('evaluer');
            $table->string('type_correction');
            $table->string('date_limit_depot');
            $table->string('enonce');
            $table->string('corrige_type')->nullable();
            $table->string('periode');
            $table->string('nom_matiere');
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
        Schema::table('devoirs', function (Blueprint $table) {
            $table->dropForeign('devoirs_formation_id_foreign');
            $table->dropForeign('devoirs_user_id_foreign');
        });
        Schema::dropIfExists('devoirs');
    }
}
