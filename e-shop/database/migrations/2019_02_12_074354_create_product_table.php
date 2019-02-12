<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product', function(Blueprint $table)
		{
			$table->string('id', 11)->primary();
			$table->string('name');
			$table->text('description', 65535);
			$table->string('thumbnail');
			$table->float('price', 10, 0);
			$table->integer('buyed');
			$table->integer('views');
			$table->integer('rate');
			$table->string('sub_category_id', 11)->index('fk_product__sub_category');
			$table->boolean('is_active')->default(1);
			$table->timestamps();
			$table->string('manufacturer_id', 11)->index('fk_product__manufaturer');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product');
	}

}
