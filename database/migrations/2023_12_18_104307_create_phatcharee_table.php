<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhatchareeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phatcharee', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('poo')->nullable();
            $table->float('pae')->nullable();
            $table->string('phatcharee')->nullable();
            $table->date('thabudom')->nullable();
            $table->text('poopae01')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phatcharee');
    }
}
