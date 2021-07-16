<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEksekusiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eksekusi', function (Blueprint $table) {
            $table->id('id_eksekusi');
            $table->unsignedBigInteger('id_datek');
            $table->date('oa_date');
            $table->text('prioritas_eksekusi_ub');
            $table->date('tanggal_eksekusi');
            $table->string('updated_by',30);
            $table->text('comment');
            $table->timestamps();
            $table->unsignedBigInteger('id_respondence');
            $table->foreign('id_respondence')->references('id')->on('respondence')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_datek')->references('id_datek')->on('datek')->onDelete('cascade')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eksekusi');
    }
}
