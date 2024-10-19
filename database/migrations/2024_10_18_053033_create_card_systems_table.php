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
        Schema::create('card_systems', function (Blueprint $table) {
            $table->id();
            
            $table->integer('file_id');          
            $table->integer('price');          
            $table->string('code');
            $table->boolean('is_charged')->default(false);
      

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
        Schema::dropIfExists('card_systems');
    }
};
