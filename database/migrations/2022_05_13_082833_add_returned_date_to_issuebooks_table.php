<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReturnedDateToIssuebooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('issuebooks', function (Blueprint $table) {
            $table->date('returned_date')->nullable();
            $table->date('canceled_date')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('issuebooks', function (Blueprint $table) {
            $table->date('returned_date')->nullable();
            $table->date('canceled_date')->nullable();
        });
    }
}
