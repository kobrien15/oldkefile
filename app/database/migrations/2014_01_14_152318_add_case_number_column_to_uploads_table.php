<?php

use Illuminate\Database\Migrations\Migration;

class AddCaseNumberColumnToUploadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('uploads', function($table)
        {
            $table->string('case_number')->after('id');
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
            $table->dropColumn('case_number');
        });
	}

}