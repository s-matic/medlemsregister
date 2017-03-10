<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('personnummer');
            $table->string('address');
            $table->string('postal_code');
            $table->string('city');
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->string('interests')->nullable();
            $table->integer('membership')->unsigned();
            $table->integer('familiy_id')->unsigned();
            $table->integer('organization_id')->unsigned();
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
        Schema::drop('members');
    }
}
