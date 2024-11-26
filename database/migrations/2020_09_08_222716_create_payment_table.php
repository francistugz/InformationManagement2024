<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clientID')->nullable();
            $table->decimal('amount', 22)->nullable()->default(0.00);
            $table->timestamp('date')->useCurrent();
            $table->string('method', 255)->nullable();
            $table->timestamp('created_at')->useCurrent();

            $table->foreign('clientID')->references('id')->on('clients')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
