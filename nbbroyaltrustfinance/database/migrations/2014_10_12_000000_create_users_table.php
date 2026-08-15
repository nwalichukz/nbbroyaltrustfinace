<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('gender')->nullable();
            $table->string('account_officer')->nullable()->default('no');
            $table->string('country')->nullable();
            $table->string('kyc_status')->nullable('not-verified'); // verified
            $table->string('mobile_number')->unique()->nullable();
            $table->string('status')->default('active'); // active, suspended, banned, not-active   
            $table->string('access_level')->default('user'); //admin, user, super-admin,    
            $table->string('avatar')->nullable();  
            $table->rememberToken()->nullable();
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
        Schema::dropIfExists('users');
    }
};
