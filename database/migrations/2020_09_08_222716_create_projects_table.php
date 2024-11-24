<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id()->startingValue(1000);
            $table->unsignedBigInteger('clientID')->nullable();
            $table->string('title', 255)->nullable();
            $table->string('location', 255)->nullable();
            $table->decimal('cost', 22)->nullable()->default(0.00);
            $table->enum('project_status', ['ongoing', 'completed'])->default('ongoing');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            

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
        Schema::dropIfExists('projects');
    }
}
