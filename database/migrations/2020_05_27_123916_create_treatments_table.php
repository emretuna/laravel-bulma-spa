<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->string('name', 60);
            $table->string('icon', 40);
            $table->longText('desc');
            $table->string('duration', 40);
            $table->longText('procedure');
            $table->string('accommodation', 60);
            $table->string('transport', 60);
            $table->string('extra', 60);
            $table->enum('assistance', ["true","false"]);
            $table->longText('guidance');
            $table->string('doctors', 120);
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
        Schema::dropIfExists('treatments');
    }
}
