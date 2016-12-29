<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsOnEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->string('sss_number')->unique();
            $table->string('philhealth_number')->unique();
            $table->string('pagibig_number')->unique();
            $table->string('tin_number')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('sss_number');
            $table->dropColumn('philhealth_number');
            $table->dropColumn('pagibig_number');
            $table->dropColumn('tin_number');
        });
    }
}
