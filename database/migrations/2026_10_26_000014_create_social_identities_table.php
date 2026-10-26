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
        Schema::create('social_identities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('provider_name', 255)->nullable();
            $table->string('provider_id', 255)->nullable();
            $table->string('provider_token', 255)->nullable();
            $table->string('provider_img_url', 255)->nullable();
            $table->unique('provider_id', 'social_identities_provider_id_unique');
            $table->unique('provider_token', 'social_identities_provider_token_unique');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_identities');
    }
};
