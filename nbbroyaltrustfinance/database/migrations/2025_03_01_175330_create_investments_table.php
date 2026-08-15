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
    
            Schema::create('investments', function (Blueprint $table) {
                $table->id();
                $table->integer('user_id')->unsigned();
                $table->string('amount');
                $table->string('investment_type_id');
                $table->timestamp('end_date');
                $table->string('possible_total_earning');
                $table->string('status'); 
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
        Schema::dropIfExists('investments');
    }
};
