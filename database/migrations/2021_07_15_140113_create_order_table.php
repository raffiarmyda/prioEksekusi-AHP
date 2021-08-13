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
            $table->id();
            $table->string('sidnim');
            $table->string('longitude', 20);
            $table->string('latitude', 20);
            $table->string('witel', 25);
            $table->string('sto');
            $table->string('bts_status');
            $table->double('billed_bandwidth');
            $table->double('request_metroport');
            $table->double('request_oltport');
            $table->double('request_ontport');
            $table->double('request_switch');
            $table->double('request_distance');
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
