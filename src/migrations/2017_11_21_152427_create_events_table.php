<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            
            // Creator of the event
            $table->string('creator_type')->nullable();
            $table->integer('creator_id')->unsigned()->nullable();

            // Group that this event belongs to
            $table->string('group_type')->nullable();
            $table->integer('group_id')->unsigned()->nullable();

            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
