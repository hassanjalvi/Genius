<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade');
            // $table->foreignId('student_id')->constrained('users')->nullable()->onDelete('cascade');
            // $table->foreignId('instructor_id')->constrained('users')->nullable()->onDelete('cascade');
            $table->foreignId('sender_id')->constrained('users')->nullable()->onDelete('cascade');
            $table->string('message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
