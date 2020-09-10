<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCondominiumBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condominium_blocks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('condominium_id');
            $table->unsignedInteger('block_id');

            $table->foreign('condominium_id')->references('id')->on('condominiums');
            $table->foreign('block_id')->references('id')->on('blocks');
            
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('condominium_blocks');
    }
}
