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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->foreignId('project_id')->constrained()->restrictOnDelete();
            $table->foreignId('priority_id')->constrained()->restrictOnDelete();
            $table->timestamp('due_date')->nullable();
            $table->integer('order')->default(999);
            $table->boolean('completed')->default(false);
            $table->timestamp('completed_at')->nullable();
            $table->foreignId('origin_creation')->nullable()->comment('As every task can be created directly on the Laravel API, or through Todoist/Google Calendar integrations, this field will identify the origin')->constrained('origins')->restrictOnDelete();
            $table->foreignId('origin_completion')->nullable()->comment('As every task can be finished/done directly on the Laravel API, or through Todoist/Google Calendar integrations, this field will show where it was marked as completed')->constrained('origins')->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
