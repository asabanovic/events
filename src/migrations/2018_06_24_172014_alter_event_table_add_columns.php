<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEventTableAddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function(Blueprint $table){
            if (!Schema::hasColumn('events', 'dial_in_number')) {
                $table->string('dial_in_number')->nullable()->after('url');
            }

            if (!Schema::hasColumn('events', 'screen_share_url')) {
                $table->string('screen_share_url')->nullable()->after('url');
            }
            
            if (!Schema::hasColumn('events', 'host')) {
                $table->string('host')->nullable()->after('url');
            }

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function(Blueprint $table){
            // if (Schema::hasColumn('events', 'host')) {
            //     $table->dropColumn('host');
            // } 

            // if (Schema::hasColumn('events', 'screen_share_url')) {
            //     $table->dropColumn('screen_share_url');
            // }

            // if (Schema::hasColumn('events', 'screen_share_url')) {
            //     $table->dropColumn('dial_in_number');
            // }
        });
    }
}
