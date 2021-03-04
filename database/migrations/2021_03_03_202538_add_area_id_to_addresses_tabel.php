<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAreaIdToAddressesTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('addresses_table', function (Blueprint $table) {
            $table->foreignId('area_id')->after("id")->constrained();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('addresses_tabel', function (Blueprint $table) {

            $table->dropForeign('area_id');
            $table->dropColumn('area_id');
        });
    }
}
