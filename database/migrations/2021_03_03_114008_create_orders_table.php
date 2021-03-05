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
            //$table->foreignId('customer_id');
            //$table->foreignId('delivery_id');
            $table->float('total', 8, 2);
            $table->string('status');
            $table->text('note');
            $table->integer('rating');
            $table->text('feedback');
            $table->string('method');
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
