<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaybuysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laybuys', function (Blueprint $table) {
            $table->id();
            $table->float('price');
            $table->float('balance');
            $table->integer('quantity');
            $table->date('dateplaced');
            $table->date('duedate');
            $table->integer('customerId');
            $table->string('product');
            $table->integer('shop');
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
        Schema::dropIfExists('laybuys');
    }
}
