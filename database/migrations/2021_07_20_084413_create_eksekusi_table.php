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
                $table->id();
                $table->foreignId('id_sidnim')->references('id')->on('Order')->onDelete('cascade')->onUpdate('cascade');
                $table->foreignId('id_datek')->references('id')->on('Datek')->onDelete('cascade')->onUpdate('cascade');
                $table->date('oa_date');
                $table->string('update_by');
                $table->text('prioritas_eksekusi_ub');
                $table->date('tanggal_eksekusi');
                $table->text ('comment');
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
        Schema::table('eksekusi', function (Blueprint $table) {
            //
        });
    }
}
