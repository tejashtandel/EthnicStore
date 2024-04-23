<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->bigInteger('mobile_no')->length(10)->nullable();
            $table->text('gender')->nullable();
            $table->string('house')->nullable();
            $table->string('street')->nullable();
            $table->string('landmark')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->integer('postcode')->length(6)->nullable();
            $table->integer('flag')->default(1);



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('firstname');
            $table->dropColumn('lastname');
            $table->dropColumn('mobile_no');
            $table->dropColumn('gender');
            $table->dropColumn('house');
            $table->dropColumn('street');
            $table->dropColumn('landmark');
            $table->dropColumn('state');
            $table->dropColumn('city');
            $table->dropColumn('postcode');
            $table->dropColumn('flag');
        });
    }
}
