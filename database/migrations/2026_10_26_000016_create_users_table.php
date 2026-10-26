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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('permission_id')->nullable();
            $table->string('name', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('mobile', 20)->nullable();
            $table->text('profile')->nullable();
            $table->text('address_line1')->nullable();
            $table->text('address_line2')->nullable();
            $table->string('postal_address', 250)->nullable();
            $table->string('postal_code', 20)->nullable();
            $table->integer('city')->nullable();
            $table->integer('district')->nullable();
            $table->integer('division')->nullable();
            $table->integer('country')->nullable();
            $table->timestamp('dob')->nullable();
            $table->string('gender', 10)->nullable();
            $table->tinyInteger('status')->default(1)->comment('0=Inactive, 1=Active, 2=draft');
            $table->tinyInteger('fetured')->default(0)->comment('0=no fetured, 1=Fetured');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255);
            $table->string('password_show', 191)->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->string('api_token', 100)->nullable();
            $table->string('device_key', 255)->nullable();
            $table->string('verify_code', 100)->nullable();
            $table->tinyInteger('verify_code_status')->default(0);
            $table->string('designation', 200)->nullable();
            $table->float('balance', 10, 2)->default(0.00);
            $table->tinyInteger('subscriber')->default(0);
            $table->tinyInteger('customer')->default(1);
            $table->tinyInteger('business')->default(0);
            $table->tinyInteger('employee')->default(0);
            $table->tinyInteger('admin')->default(0);
            $table->bigInteger('addedby_id')->nullable();
            $table->timestamp('addedby_at')->nullable();
            $table->unique('email', 'users_email_unique');
            $table->unique('mobile', 'mobile');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
