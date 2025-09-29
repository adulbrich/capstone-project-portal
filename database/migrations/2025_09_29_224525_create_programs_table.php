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
        Schema::disableForeignKeyConstraints();

        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('course_id', 32);
            $table->string('course_name');
            $table->enum('campus_name', ["Corvallis","Cascades","Portland","Newport","La Grande","Online"]);
            $table->unsignedInteger('terms');
            $table->unique(['course_id', 'course_name', 'campus_name']);
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
