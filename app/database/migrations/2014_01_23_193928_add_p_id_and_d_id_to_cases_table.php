<?php

use Illuminate\Database\Migrations\Migration;

class AddPIdAndDIdToCasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cases', function($table)
        {
            $table->string('p_id')->after('case_number');
            $table->string('d_id')->after('p_id');
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
            $table->dropColumn('p_id');
            $table->dropColumn('d_id');
        });
	}

}