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
    { #+id +name +parrent +seo_title +seo_desc +seo_keyword
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_fr');
            $table->string('name_tr');
            $table->string('image')->nullable();
            $table->string('parent')->nullable();
            $table->string('slug');
            $table->string('seo_title_en')->nullable();
            $table->string('seo_title_fr')->nullable();
            $table->string('seo_title_tr')->nullable();
            $table->text('seo_desc_en')->nullable();
            $table->text('seo_desc_fr')->nullable();
            $table->text('seo_desc_tr')->nullable();
            $table->text('seo_keyword_en')->nullable();
            $table->text('seo_keyword_fr')->nullable();
            $table->text('seo_keyword_tr')->nullable();
            $table->enum('status',['0','1'])->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
