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
        Schema::create('program_participants', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->foreignId('challenge_id')
                ->nullable()
                ->constrained('challenges')
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->foreignId('company_id')
                ->nullable()
                ->constrained('companies')
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->foreignId('program_id')
                ->nullable()
                ->constrained('programs')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
