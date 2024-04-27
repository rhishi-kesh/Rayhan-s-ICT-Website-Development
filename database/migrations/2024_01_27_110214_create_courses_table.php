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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('is_footer')->default('1')->comment("1 = deactive, 0 = active");
            $table->foreignId('is_bestSelling')->default('1')->comment("1 = deactive, 0 = active");
            $table->foreignId('department_id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('is_active')->default('1')->comment("1 = deactive, 0 = active");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
