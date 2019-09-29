<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->ipAddress('coustomer_ip');
            $table->integer('product_id');
            $table->integer('color_id');
            $table->integer('size_id');
            $table->integer('product_quentity');
            $table->integer('product_price');
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
        Schema::dropIfExists('seals');
    }
}
