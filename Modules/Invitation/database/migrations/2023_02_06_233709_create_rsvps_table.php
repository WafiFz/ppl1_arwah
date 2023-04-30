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
        Schema::create('rsvps', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->integer('amount_guest');
            $table->boolean('is_attend');

            // Foreign Key
            $table->foreignId('invitation_id');   $table->foreign('invitation_id')->references('id')->on('invitations');
            $table->foreignId('guest_id')->nullable();   $table->foreign('guest_id')->references('id')->on('guests');


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
        Schema::dropIfExists('rsvps');
    }
};
