<?php

use App\Enum\UserRole;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('adresse_mel')->unique();
            $table->enum('role', [UserRole::ETUDIANT, UserRole::PROF, UserRole::ADMIN]);
            $table->string('titre')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('formation_id')->nullable();
            $table->foreign('formation_id')->references('id')->on('formations');
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
        Schema::table('users',function (Blueprint $table){
            $table->dropForeign('users_formation_id_foreign');
        });
        Schema::dropIfExists('users');
    }
}
