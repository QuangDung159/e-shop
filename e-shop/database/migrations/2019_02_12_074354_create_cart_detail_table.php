<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCartDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cart_detail', function(Blueprint $table)
		{
			$table->string('cart_id', 11);
			$table->string('product_id', 11)->index('fk_cart_detail__product');
			$table->integer('quantity');
			$table->timestamps();
			$table->primary(['cart_id','product_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cart_detail');
	}

}
