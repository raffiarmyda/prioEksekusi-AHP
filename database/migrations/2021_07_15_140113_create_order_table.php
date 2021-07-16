<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->string('sidnim')->primary();
            $table->string('longitude', 20);
            $table->string('latitude', 20);
            $table->string('witel', 25);
            $table->string('sto', 30);
            $table->string('bts_status',10);
            $table->integer('billed_bandwidth');
            $table->integer('request_metroport');
            $table->integer('request_oltport');
            $table->integer('request_ontport');
            $table->integer('request_switch');
            $table->string('input_by', 30);
            $table->date('input_at');
            $table->text('comment');
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
        Schema::dropIfExists('order');
    }
}
