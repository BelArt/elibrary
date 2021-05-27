<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cases', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->foreignId('fund_id')
                ->constrained()
                ->onDelete('cascade');

//            $table->foreignId('inventory_id')
//                ->constrained()
//                ->onDelete('cascade');

            $table->unsignedBigInteger('inventory_id');

            $table->string('number', 20);
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('year')->nullable();

            $table->foreign('inventory_id')->references('id')->on('inventory')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('case');
    }
}
