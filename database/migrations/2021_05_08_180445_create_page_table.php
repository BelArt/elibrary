<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->foreignId('fund_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

//            $table->foreignId('inventory_id')
//                ->constrained()
//                ->onUpdate('cascade')
//                ->onDelete('cascade');

            $table->unsignedBigInteger('inventory_id');

//            $table->foreignId('case_id')
//                ->constrained()
//                ->onUpdate('cascade')
//                ->onDelete('cascade');
            $table->unsignedBigInteger('case_id');

            $table->integer('page_number');
            $table->string('file');
            $table->text('description')->nullable();

            $table->foreign('inventory_id')->references('id')->on('inventory')->onDelete('cascade');;
            $table->foreign('case_id')->references('id')->on('cases')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page');
    }
}
