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

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->dateTime('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();;
            $table->timestamp('email_verified_at')->nullable()->default(null);
            $table->string('name')->nullable()->default(null);
            $table->string('affiliation')->nullable()->default(null);
            $table->string('image_url', 2048)->nullable()->default(null);
            $table->enum('role', ["admin","instructor","user"])->index()->default('user');
            $table->text('two_factor_secret')->nullable()->default(null);
            $table->text('two_factor_recovery_codes')->nullable()->default(null);
            $table->timestamp('two_factor_confirmed_at')->nullable()->default(null);
            $table->rememberToken();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
