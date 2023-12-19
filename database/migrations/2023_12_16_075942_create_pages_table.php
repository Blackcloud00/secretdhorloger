<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *   'id',
     *   'parent',
     *   'nameFR',
     *   'nameEN',
     *   'nameDE',
     *   'contentFR',
     *   'contentEN',
     *   'contentDE',
     *   'banner_img',
     *   'status',
     */
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent')->nullable();
            $table->string('slug')->nullable();
            $table->string('nameFR');
            $table->string('nameEN')->nullable();
            $table->string('nameDE')->nullable();
            $table->text('contentFR')->nullable();
            $table->text('contentEN')->nullable();
            $table->text('contentDE')->nullable();
            $table->string('banner_img')->nullable();
            $table->enum('status',['0','1'])->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
