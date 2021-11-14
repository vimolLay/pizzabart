<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDrinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_drink', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('date');
            $table->string('time');
            $table->integer('drink_id');
            $table->string('small_drink')->default(0) ;
            $table->string('medium_drink')->default(0);
            $table->string('large_drink')->default(0);
            $table->text('body');
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('orders_drink');
    }
}
