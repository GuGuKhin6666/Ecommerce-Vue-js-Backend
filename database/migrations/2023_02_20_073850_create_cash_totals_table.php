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
        Schema::create('cash_totals', function (Blueprint $table) {
            $table->id();
            $table->integer('total');
            $table->date('date');
            $table->text('code')->default('STKT009');
            $table->text('products')->nullable(true);
            $table->integer('quantity')->nullable(true);
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
        Schema::dropIfExists('cash_totals');
    }
};