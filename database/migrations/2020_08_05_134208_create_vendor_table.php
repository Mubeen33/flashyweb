<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('phone');
            $table->string('mobile');
            $table->longtext('business_info');
            $table->tinyInteger('vat_register');
            $table->string('company_name')->nullable();
            $table->string('website_url')->nullable();
            $table->string('director_first_name')->nullable();
            $table->string('director_last_name')->nullable();
            $table->string('director_email')->nullable();
            $table->string('additional_info')->nullable();
            $table->tinyInteger('active')->default('0');
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
        Schema::dropIfExists('vendor');
    }
}
