<?php

use Illuminate\Database\Migrations\Migration;

class AddPartiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('parties', function($table)
		{
			$table->increments('id');
			$table->string('name', 128);
			$table->string('street', 255);
			$table->string('city', 255);
			$table->string('state', 255);
			$table->string('zip', 255);
			$table->string('phone', 255);
			$table->string('SSN', 255);
			$table->string('DL', 255);
			$table->string('DOB', 255);
			$table->string('alias', 255);
			$table->string('alias2', 255);
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
		Schema::drop('parties');
	}

}