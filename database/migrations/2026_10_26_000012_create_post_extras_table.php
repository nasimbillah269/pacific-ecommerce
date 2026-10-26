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
        Schema::create('post_extras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('src_id')->nullable();
            $table->string('name', 191)->nullable();
            $table->text('content')->nullable();
            $table->string('banner_link', 100)->nullable();
            $table->bigInteger('parent_id')->nullable();
            $table->integer('drag')->default(0);
            $table->float('shipping_charge', 10, 2)->default(0.00);
            $table->string('status', 10)->nullable();
            $table->integer('type')->default(0)->comment('0=Page,1=Subscribe, 2=Product Extra Attribute, 3=Expenses, 4=Home Product, 5=Offer banner');
            $table->bigInteger('addedby_id')->nullable();
            $table->bigInteger('editedby_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_extras');
    }
};
