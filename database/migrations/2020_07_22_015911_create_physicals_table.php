<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhysicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physicals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('athlete_id');
            $table->boolean('consent_form')->default(0);
            $table->boolean('concussion_form')->default(0);
            $table->boolean('evaluation_form')->default(0);
            $table->boolean('cardiac_form')->default(0);
            $table->date('exam_date');
            $table->string('restrictions')->nullable();
            $table->text('notes')->nullable();
            $table->string('form_path')->nullable();
            $table->timestamps();

            $table->foreign('athlete_id')->references('id')
                ->on('athletes')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('physicals');
    }
}
