<?php

use Illuminate\Database\Migrations\Migration;

class AddDisplayNameBarNumberToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($table)
        {
            $table->string('display_name')->after('password');
            $table->string('bar_number')->after('password');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function($table)
        {
            $table->dropColumn('display_name');
            $table->dropColumn('bar_number');
        });
	}

}