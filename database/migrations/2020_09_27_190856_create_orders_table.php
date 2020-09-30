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
            $table->string('order_id')->nullable();//will fill after insert order data
            $table->unsignedBigInteger('vendor_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('vendor_product_id');//vendor_products tbl id
            $table->integer('qty');
            $table->unsignedBigInteger('address_id');
            $table->integer('grand_total');
            $table->enum('payment_option', ['EFT', 'Debit', 'Visa', 'Master', 'Ozow_ipay']);
            $table->enum('status', ['Pending', 'Canceled', 'Completed'])->default('Pending');
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
