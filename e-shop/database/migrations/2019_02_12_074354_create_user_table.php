<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function(Blueprint $table)
		{
			$table->string('id', 11)->primary();
			$table->string('username', 10)->unique('username');
			$table->string('email', 100)->unique('email');
			$table->string('password', 100);
			$table->string('role_id', 11)->index('fk_user__role');
			$table->string('phone', 13);
			$table->string('shiping_address_id', 11);
			$table->date('dob');
			$table->boolean('is_active')->default(1);
			$table->timestamps();
			$table->integer('point');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user');
	}

}
