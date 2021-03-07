<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddMealIdToOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('order_items', function (Blueprint $table) {
            $table->foreignId('meal_id')->after('id')->constrained();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('order_items', function (Blueprint $table) {
            $table->dropForeign('meal_id');
            $table->dropColumn('meal_id');
        });
    }
}
