<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('date_of_entry');
            $table->dropColumn('date_of_send');
            $table->dropColumn('note');
            $table->dropColumn('customer_name');
            $table->dropColumn('tokos_name');
            $table->integer('merk_id')->before('grand_total');
            $table->integer('typeraket_id')->before('created_at');
            $table->integer('ordermaster_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('ordermaster_id');
            $table->string('date_of_entry');
            $table->string('date_of_send');
            $table->string('note');
            $table->string('customer_name');
            $table->string('tokos_name');
            $table->dropColumn('merk_id')->before('grand_total');
            $table->dropColumn('typeraket_id')->before('created_at');
        });
    }
}
