<?php

use Illuminate\Database\Migrations\Migration;

class AddCaptionToCaseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cases', function($table)
        {
            $table->string('caption')->after('case_number');
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
            $table->dropColumn('caption');
        });
	}

}