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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('total_price'); 
            $table->string('type')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('transaction_time')->nullable();
            $table->string('transaction_status')->nullable();

            // Foreign Key
            $table->foreignId('user_id');               $table->foreign('user_id')->references('id')->on('users');
            $table->foreignUuid('order_id');              $table->foreign('order_id')->references('id')->on('orders');

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
        Schema::dropIfExists('payments');
    }
};
