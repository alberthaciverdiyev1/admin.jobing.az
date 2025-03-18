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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable(false);
            $table->string('az_title')->nullable(false);
            $table->string('ru_title')->nullable(false);
            $table->string('en_title')->nullable(false);
            $table->longText('az_content')->nullable(false);
            $table->longText('ru_content')->nullable(false);
            $table->longText('en_content')->nullable(false);
            $table->string('main_image')->nullable(false);
            $table->boolean('is_active')->default(true);
            $table->boolean('show_in_home_page')->default(true);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
