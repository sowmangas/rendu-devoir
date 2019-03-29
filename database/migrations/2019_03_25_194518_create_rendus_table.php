<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRendusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rendus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('devoir_id');
            $table->foreign('devoir_id')->references('id')->on('devoirs');
            $table->enum('rendu',['Oui','Non'])->default('Non');
            $table->date('date_depot');
            $table->string('note');
            $table->text('commentaire');
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
        Schema::table('rendus', function (Blueprint $table) {
            $table->dropForeign('rendus_user_id_foreign');
            $table->dropForeign('rendus_devoir_id_foreign');
        });
        Schema::dropIfExists('rendus');
    }
}
