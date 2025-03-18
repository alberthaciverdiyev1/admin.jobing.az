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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('phone_number_1')->nullable();
            $table->string('phone_number_2')->nullable();
            $table->string('phone_number_3')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->longText('az_about_company')->nullable();
            $table->longText('ru_about_company')->nullable();
            $table->longText('en_about_company')->nullable();
            $table->string('az_company_name')->nullable();
            $table->string('ru_company_name')->nullable();
            $table->string('en_company_name')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->text('google_map_location')->nullable();
            $table->text('instagram_url')->nullable();
            $table->text('facebook_url')->nullable();
            $table->string('banner_video')->nullable();
            $table->string('favicon')->nullable();
            $table->string('logo')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
