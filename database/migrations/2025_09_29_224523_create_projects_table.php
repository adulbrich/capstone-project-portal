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

        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->longText('description')->nullable();
            $table->longText('deliverables')->nullable();
            $table->longText('qualifications_minimum')->nullable();
            $table->longText('qualifications_preferred')->nullable();
            $table->string('website_url', 2048)->nullable();
            $table->string('repository_url', 2048)->nullable();
            $table->string('image_url', 2048)->nullable();
            $table->string('video_url', 2048)->nullable();
            $table->string('image_alt')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->unsignedBigInteger('created_by_user_id')->index();
            $table->foreign('created_by_user_id')->references('id')->on('users');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();;
            $table->unsignedBigInteger('updated_by_user_id')->index();
            $table->foreign('updated_by_user_id')->references('id')->on('users');
            $table->enum('status', ["draft","submitted_for_review","approved","changes_requested","published","archived"])->index();
            $table->string('contact_email')->nullable();
            $table->unsignedBigInteger('contact_user_id')->index()->nullable();
            $table->foreign('contact_user_id')->references('id')->on('users');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
