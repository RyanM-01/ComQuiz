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
        Schema::create('quiz', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bab_id'); // Reference to 'id' column of 'bab' table
            $table->string('matkul_code', 10);
            $table->foreign('matkul_code')->references('code')->on('matkul')->onDelete('cascade');
            $table->string('quiz_desc');
            $table->timestamps();
            $table->foreign('bab_id')->references('id')->on('bab')->onDelete('cascade');
        });

        Schema::table('quiz', function (Blueprint $table) {
            $table->index('bab_id');
            $table->index('matkul_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('quiz', function (Blueprint $table) {
            $table->dropForeign(['bab_id']);
            $table->dropForeign(['matkul_code']);
        });

        Schema::dropIfExists('quiz');
    }
};