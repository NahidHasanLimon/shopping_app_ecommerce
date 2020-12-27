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
            $table->integer('user_id')->nullable();
            $table->string('status')->default('processing');
            $table->string('coupon_code')->nullable();
            $table->string('coupon_value')->nullable();
            $table->decimal('discount',8, 2)->default(0.0);
            $table->decimal('sub_total',8, 2)->default(0.0);
            $table->decimal('total',8, 2)->default(0.0);
            $table->tinyInteger('is_different_shipping')->default(0);
            $table->tinyInteger('is_guest_checkout')->default(0);
            $table->timestamp('date',6);
            $table->timestamp('shipping_date', 6)->nullable();
            $table->string('notes')->nullable();
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
