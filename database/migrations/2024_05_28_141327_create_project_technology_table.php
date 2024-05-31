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
        Schema::create('project_technology', function (Blueprint $table) {

            // relazione con projects
            $table->unsignedBigInteger('project_id');
            // FK
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->cascadeOnDelete(); //nel momento in cui viene eliminato un progetto o una tecnologia viene cancellato il record della relazione

            // relazione con technologies
            $table->unsignedBigInteger('technology_id');
            // FK
            $table->foreign('technology_id')
                ->references('id')
                ->on('technologies')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_technology');
    }
};
