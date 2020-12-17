<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('session_id');
            $table->string('coupon_code')->nullable();
            $table->decimal('coupon_value',8, 2)->default(0.0);
            $table->integer('number_of_items_in_cart')->default(0);
            $table->decimal('sub_total', 8, 2)->default(0.0);
            $table->decimal('total', 8, 2)->default(0.0);
            $table->tinyInteger('is_active')->default(1);
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
        Schema::dropIfExists('carts');
    }
}
