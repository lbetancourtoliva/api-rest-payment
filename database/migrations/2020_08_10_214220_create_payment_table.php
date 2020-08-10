<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment', function (Blueprint $table) {
            $table->increments('id');
            $table->date('payment_date');
            $table->unsignedInteger('company_id');
            $table->string('amount');
            $table->unsignedInteger('payment_method_id');
            $table->string('external_reference');
            $table->integer('terminal');
            $table->string('status');
            $table->string('reference')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('payment');
    }
}
