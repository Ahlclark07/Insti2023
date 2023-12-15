<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projets_recherches', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('designations');
            $table->string('implication');
            $table->string('niveau_avancement');
            $table->string('objectifs');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projets_recherches');
    }
};
