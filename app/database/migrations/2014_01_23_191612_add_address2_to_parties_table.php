<?php

use Illuminate\Database\Migrations\Migration;

class AddAddress2ToPartiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('parties', function($table)
        {
            $table->string('address2')->after('address1');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('parties', function($table)
        {
            $table->dropColumn('address2');
        });
	}

}