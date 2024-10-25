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
        Schema::create('requisitions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key for the user who made the requisition
            $table->foreignId('department_id')->constrained()->onDelete('cascade'); // Foreign key for the department making the requisition
            $table->decimal('total_cost', 10, 2)->default(0); // Total cost (default to 0)
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Status of the requisition
            $table->foreignId('approved_by')->nullable()->constrained('users')->onDelete('set null'); // User who approved (nullable)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requisitions');
    }
};
