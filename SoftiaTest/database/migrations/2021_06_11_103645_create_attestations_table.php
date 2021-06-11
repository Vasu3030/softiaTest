<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttestationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('attestations', function (Blueprint $table) {
            $table->id('idAttestation');
            $table->unsignedBigInteger('etudiant')->nullable()->unsigned();
            $table->foreign('etudiant')->references('idEtudiant')->on('etudiants');
            $table->unsignedBigInteger('convention')->nullable()->unsigned();
            $table->foreign('convention')->references('idConvention')->on('conventions');
            $table->text('message');
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
        Schema::dropIfExists('attestations');
        Schema::enableForeignKeyConstraints();
    }
}
