<?php

use Illuminate\Database\Migrations\Migration;

class AddUserIdToCasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cases', function($table)
        {
            $table->string('user_id')->after('filing_attorney');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cases', function($table)
        {
            $table->dropColumn('user_id');
        });
	}

}