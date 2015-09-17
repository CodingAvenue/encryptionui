<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration 
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encryptions', function(Blueprint $table)
        {
            $table->increments('encryption_id');
            $table->string('author');
            $table->string('encrypted_data', 10000);
            $table->string('encryption_code')->nullable();
            $table->timestamp("date_logged")->default(DB::raw('CURRENT_TIMESTAMP'));
        });

        Schema::create('user_logs', function(Blueprint $table)
        {
            $table->increments('log_id');
            $table->string('email_address');
            $table->string('browser')->nullable();
            $table->string('ip_address');
            $table->timestamp("date_logged")->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }
}
