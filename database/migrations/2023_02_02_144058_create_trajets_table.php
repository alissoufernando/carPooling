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
        Schema::create('trajets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('voiture_id')->constrained('voitures')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->dateTime('date_depart');
            $table->string('ville_depart');
            $table->string('ville_dest');
            $table->boolean('statut')->default(0);
            $table->string('point_depart');
            $table->string('place_initial');
            $table->string('place_occupe');
            $table->string('prix');
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
        Schema::dropIfExists('trajets');
    }
};
