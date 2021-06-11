<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id('idEtudiant');
            $table->string('nom');
            $table->string('prenom');
            $table->string('mail');
            $table->unsignedBigInteger('convention')->nullable()->unsigned();
            $table->foreign('convention')->references('idConvention')->on('conventions');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('etudiants');
        Schema::enableForeignKeyConstraints();
    }
}
