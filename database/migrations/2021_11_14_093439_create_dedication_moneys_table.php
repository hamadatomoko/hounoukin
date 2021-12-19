<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDedicationMoneysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dedication_moneys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
             $table->timestamp('date')->nullable();
              $table->integer('money');
               $table->string('memo')->nullable();
                $table->bigInteger('dedicater_id');
                  $table->bigInteger('festival_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dedication_moneys');
    }
}
