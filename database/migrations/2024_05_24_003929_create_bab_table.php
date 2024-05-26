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
        Schema::create('bab', function (Blueprint $table) {
            $table->id();
            $table->string('matkul_code', 10); // Change 'matkul_id' to 'matkul_code'
            $table->foreign('matkul_code')->references('code')->on('matkul')->onDelete('cascade');
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bab', function (Blueprint $table) {
            $table->dropForeign(['matkul_code']);
        });

        Schema::dropIfExists('bab');
    }
};
