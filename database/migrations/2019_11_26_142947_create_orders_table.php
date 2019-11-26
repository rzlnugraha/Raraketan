<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->date('date_of_entry');
            $table->string('customer_name');
            $table->string('no_raket');
            $table->string('jenis_raket');
            $table->string('damage_position')->nullable();
            $table->string('damage_image')->nullable();
            $table->integer('damage_qty');
            $table->integer('price');
            $table->date('date_of_send')->nullable();
            $table->string('note')->nullable();

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
        Schema::dropIfExists('orders');
    }
}
