<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateEventsZip extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('zip')->nullable()->after('city');
            $table->float('latitude', 13, 7)->nullable()->after('zip');
            $table->float('longitude', 13, 7)->nullable()->after('latitude');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('events', function (Blueprint $table)
        // {
        //     $table->dropColumn('zip');
        //     $table->dropColumn('latitude');
        //     $table->dropColumn('longitude');
        // });
    }
}
