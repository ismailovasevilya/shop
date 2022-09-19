<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->integer('total_qty')->nullable();
            $table->bigInteger('total_price')->nullable();
            $table->string('phone_number');
            $table->string('status')->default('awaiting');
            $table->text('address')->nullable();
            $table->string('session_key')->nullable();
            $table->timestamps();
            $table->foreign('user_id')
                    ->references('id')->on('users');
            
        });
    }

    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
