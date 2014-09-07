<?php

use Illuminate\Database\Migrations\Migration;

class AddUserIdAndCaseIdTouploadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('uploads', function($table)
        {
            $table->string('user_id')->after('filed_by');
            $table->string('case_id')->after('case_number');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('uploads', function($table)
        {
            $table->dropColumn('user_id');
            $table->dropColumn('case_id');
        });
	}

}