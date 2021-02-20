<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')->cascadeOnDelete();
//            $table->string('type');// Billing/Shipping
            $table->enum('type',['Personal','Business','Billing','Shipping']);
            $table->string('recipient_name',100);
            $table->string('recipient_phone_no',20);
            $table->string('street_address');
            $table->string('business_name')->nullable();
            $table->string('building_complex')->nullable();
            $table->string('suburb')->nullable();
            $table->string('city_town');
            $table->string('province');
            $table->string('postal_code');


//            $table->string('address');
//            $table->string('city');
//            $table->string('state');
//            $table->string('zip_code');
//            $table->string('country');
            $table->timestamps();


        });
    }
//    $table->id();
////            $table->unsignedBigInteger('customer_id');
////            $table->foreign('customer_id')->references('id')->on('customers')->cascadeOnDelete();
//
//    $table->foreignId('customer_id')->constrained();
//    $table->enum('type',['personal','business']);
//    $table->string('recipient_name',100);
//    $table->string('recipient_phone_no',20);
//    $table->string('street_address');
//    $table->string('business_name')->nullable();
//    $table->string('building_complex')->nullable();
//    $table->string('suburb')->nullable();
//    $table->string('city_town');
//    $table->string('province');
//    $table->string('postal_code');
//    $table->softDeletes();
//    $table->timestamps();

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_addresses');
    }
}
