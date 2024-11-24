<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id()->startingValue(1000);
            $table->unsignedBigInteger('clientID')->nullable();
            $table->unsignedBigInteger('projectID')->nullable();
            $table->timestamp('Date')->useCurrent();
            $table->string('title', 255)->nullable();
            $table->timestamp('DueDate')->useCurrent();
            $table->decimal('TotalDue', 22)->nullable()->default(0.00);
            $table->timestamps();
            
        
            $table->foreign('clientID')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('projectID')->references('id')->on('projects')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
