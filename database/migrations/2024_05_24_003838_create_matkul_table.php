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
        Schema::create('matkul', function (Blueprint $table) {
            $table->id();
            $table->string('code',10)->unique();
            $table->string('name');
            $table->string('semester',2)->nullable();
            $table->timestamps();
        });
        Schema::table('matkul', function (Blueprint $table) {
            $table->index('code');
        });
        DB::statement("ALTER TABLE matkul ADD photo LONGBLOB NULL");
    }
   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matkul');
        
    }
};
