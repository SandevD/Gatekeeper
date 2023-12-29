<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('exit_passes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('leader_id')->nullable()->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('checkpoint_id')->nullable()->references('id')->on('buildings')->cascadeOnDelete();
            $table->string('description', 256);
            $table->time('time')->nullable();
            $table->string('reason_type', 256);
            $table->boolean('status')->default(false);
            $table->date('date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->time('check_out')->nullable();
            $table->time('check_in')->nullable();
            $table->time('checkpoint_in')->nullable();
            $table->time('checkpoint_out')->nullable();
            $table->time('approved_at')->nullable();
            $table->string('check_out_note', 256)->nullable();
            $table->string('check_in_note', 256)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exit_passes');
    }
};
