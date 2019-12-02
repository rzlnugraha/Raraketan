<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCustomerAndToko extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ordermasters', function (Blueprint $table) {
            $table->string('customer_name')->nullable()->change();
            $table->string('tokos_name')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ordermasters', function (Blueprint $table) {
            $table->string('customer_name')->change();
            $table->string('tokos_name')->change();
        });
    }
}
