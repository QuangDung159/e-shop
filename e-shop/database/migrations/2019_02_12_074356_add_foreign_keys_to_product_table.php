<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('product', function(Blueprint $table)
		{
			$table->foreign('manufacturer_id', 'fk_product__manufaturer')->references('id')->on('manufacturer')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('sub_category_id', 'fk_product__sub_category')->references('id')->on('sub_category')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('product', function(Blueprint $table)
		{
			$table->dropForeign('fk_product__manufaturer');
			$table->dropForeign('fk_product__sub_category');
		});
	}

}
