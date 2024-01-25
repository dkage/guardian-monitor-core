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
            $table->string('name');
            $table->text('description')->nullable();
            $table->foreignId('project_id')->constrained();
            $table->foreignId('priority_id')->constrained();
            $table->timestamp('due_date')->nullable();
            $table->integer('order')->default(999);
            $table->boolean('completed')->default(false);
            $table->timestamp('completed_at')->nullable();
            $table->foreignId('origin_creation')->nullable()->comment('As every task can be created directly on the Laravel API, or through Todoist/Google Calendar integrations, this field will identify the origin')->constrained('task_origins');
            $table->foreignId('origin_completion')->nullable()->comment('As every task can be finished/done directly on the Laravel API, or through Todoist/Google Calendar integrations, this field will show where it was marked as completed')->constrained('task_origins');
            $table->string('color')->nullable();
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
