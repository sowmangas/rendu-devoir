<?php

use App\Enum\ModificationNoteStatus;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusFieldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('modification_notes', function (Blueprint $table) {
            $table->enum('status', [
                ModificationNoteStatus::PENDING,
                ModificationNoteStatus::Ok,
            ]);
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
            //
        });
    }
}
