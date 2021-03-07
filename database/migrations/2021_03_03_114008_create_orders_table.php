<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->integer('total');
            $table->string('status');
            $table->text('note');
            $table->integer('rating');
            $table->text('feedback');
            $table->string('method');
            $table->foreignId('customer_id');
            $table->foreignId('delivery_id');
            $table->timestamps();

        });

    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down ()
    {
        Schema::dropIfExists('orders');
    }
}
