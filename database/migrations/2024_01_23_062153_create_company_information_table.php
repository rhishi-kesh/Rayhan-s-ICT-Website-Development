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
        Schema::create('company_information', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('gmail');
            $table->string('logo');
            $table->string('facebook');
            $table->string('instragram');
            $table->string('linkedin');
            $table->string('youtube');
            $table->string('locationText');
            $table->string('locationLink');
            $table->string('openClose');
            $table->string('eTinNo');
            $table->string('tradeLienceNo');
            $table->text('footerAbout');
            $table->text('googlemap');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_information');
    }
};
