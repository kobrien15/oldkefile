<?php

use Illuminate\Database\Migrations\Migration;

class MakeSSNUniqueOnPartiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('parties', function($table)
		{
			$table->unique('SSN');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropColumn('SSN');
	}

}