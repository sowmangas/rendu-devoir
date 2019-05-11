<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModificationNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modification_notes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('note');
            $table->string('commentaire');
            $table->string('justif');
            $table->string('old_commentaire');
            $table->string('old_note');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('rendu_id');
            $table->foreign('rendu_id')->references('id')->on('rendus');
            $table->unsignedBigInteger('etudiant_id');
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
        Schema::table('modification_notes', function (Blueprint $table) {
            $table->dropForeign('modification_notes_user_id_foreign');
            $table->dropForeign('modification_notes_rendu_id_foreign');
        });
        Schema::dropIfExists('modification_notes');
    }
}
