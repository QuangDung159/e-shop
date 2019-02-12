<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProductImageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('product_image', function(Blueprint $table)
		{
			$table->foreign('image_id', 'fk_product_image__image')->references('id')->on('image')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('product_id', 'fk_product_image__product')->references('id')->on('product')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('product_image', function(Blueprint $table)
		{
			$table->dropForeign('fk_product_image__image');
			$table->dropForeign('fk_product_image__product');
		});
	}

}
