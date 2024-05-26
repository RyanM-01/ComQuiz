<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('fullname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('gender');
            $table->enum('role', ['user', 'admin'])->default('user');
            $table->integer('score')->default(0);
            $table->integer('balance')->default(0);
            $table->integer('dailystrike')->default(0);
            $table->timestamp('last_quiz_completed_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            
        });

        DB::statement("ALTER TABLE users ADD photo LONGBLOB NULL");

        DB::statement("ALTER TABLE users MODIFY COLUMN gender ENUM('L', 'P')");
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
