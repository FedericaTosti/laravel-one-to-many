<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('tasks', function (Blueprint $table) {
        $table-> foreign("employee_id" , "m_employee")
                -> references("id")
                -> on("employees")
                -> onDelete("cascade");
      });

      Schema::table('employee_location', function (Blueprint $table) {
        $table-> foreign("employee_id" , "my_employee")
              -> references("id")
              -> on("employees")
              -> onDelete("cascade");

        $table-> foreign("location_id" , "m_location")
              -> references("id")
              -> on("locations")
              -> onDelete("cascade");
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('tasks', function (Blueprint $table) {
        $table-> dropForeign("m_employee");
      });

      Schema::table('employee_location', function (Blueprint $table) {
        $table-> dropForeign("my_employee");
        $table-> dropForeign("m_location");
      });
    }
}
