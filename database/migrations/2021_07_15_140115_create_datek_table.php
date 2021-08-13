<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatekTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datek', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sidnim')->constrained('Order')->onDelete('cascade')->onUpdate('cascade');
            $table->char('metro',15);
            $table->string('metro_port',15);
            $table->string('hostname_gpon',20);
            $table->string('olt_port', 15);
            $table->string('mac_ne', 20);
            $table->string('ip_address_ont', 15);
            $table->string('ont_port', 7);
            $table->string('activity', 50);
            $table->char('priority');
            $table->string('progress', 25);
            $table->string('datek_evidence', 30);
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
        Schema::dropIfExists('datek');
    }
}
