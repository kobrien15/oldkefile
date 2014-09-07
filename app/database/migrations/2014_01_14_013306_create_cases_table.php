<?php

use Illuminate\Database\Migrations\Migration;

class CreateCasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cases', function($table)
		{
			$table->increments('id');
			$table->string('type', 128);
			$table->string('filing_attorney', 255);
			$table->string('case_number');
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
		Schema::drop('cases');
	}

}