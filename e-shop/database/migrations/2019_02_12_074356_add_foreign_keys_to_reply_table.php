<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToReplyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('reply', function(Blueprint $table)
		{
			$table->foreign('comment_id', 'fk_reply__comment')->references('id')->on('comment')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'fk_reply__user')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('reply', function(Blueprint $table)
		{
			$table->dropForeign('fk_reply__comment');
			$table->dropForeign('fk_reply__user');
		});
	}

}
