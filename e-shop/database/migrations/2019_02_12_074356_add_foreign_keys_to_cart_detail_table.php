<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCartDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cart_detail', function(Blueprint $table)
		{
			$table->foreign('cart_id', 'fk_cart_detail__cart')->references('id')->on('cart')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('product_id', 'fk_cart_detail__product')->references('id')->on('product')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cart_detail', function(Blueprint $table)
		{
			$table->dropForeign('fk_cart_detail__cart');
			$table->dropForeign('fk_cart_detail__product');
		});
	}

}
