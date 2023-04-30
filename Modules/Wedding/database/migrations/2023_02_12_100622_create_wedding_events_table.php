<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wedding_events', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->dateTime('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('place');

            // Foreign Key
            $table->foreignId('wedding_id');   $table->foreign('wedding_id')->references('id')->on('weddings');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wedding_events');
    }
};
