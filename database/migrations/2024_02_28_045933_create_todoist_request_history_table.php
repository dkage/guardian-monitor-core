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
        Schema::create('todoist_requests', function (Blueprint $table) {

            $table->id();
            $table->uuid()->index();

            $table->string('endpoint');
            $table->string('command_type');
            $table->text('parameters');
            $table->boolean('success');
            $table->text('response');

            $table->timestamp('sent_at');
            $table->timestamp('responded_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todoist_request_history');
    }
};
