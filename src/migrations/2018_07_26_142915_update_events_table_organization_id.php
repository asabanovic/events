<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateEventsTableOrganizationId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            // Creator of the event
            $table->integer('organization_id')->unsigned()->nullable()->after('creator_id');
            $table->string('organization_type')->nullable()->after('organization_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function(Blueprint $table) {
            if (Schema::hasColumn('events', 'organization_id')) {
                $table->dropColumn('organization_id');
            }

            if (Schema::hasColumn('events', 'organization_type')) {
                $table->dropColumn('organization_type');
            }
        });
    }
}
