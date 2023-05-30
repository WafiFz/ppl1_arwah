<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

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

            $table->string('name')->nullable();
            $table->dateTime('date')->nullable()->default(Carbon::now());
            $table->time('start_time')->nullable()->default('09:00:00');
            $table->time('end_time')->nullable()->default('13:00:00');;
            $table->string('place')->nullable();

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
