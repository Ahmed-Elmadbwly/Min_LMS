<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();
        });

        // Insert 20 level records
        $levels = [
            'Beginner',
            'Elementary',
            'Pre-Intermediate',
            'Intermediate',
            'Upper-Intermediate',
            'Advanced',
            'Proficient',
            'Expert',
            'Master',
            'Foundation',
            'Basic',
            'Developing',
            'Competent',
            'Skilled',
            'Professional',
            'Senior',
            'Lead',
            'Principal',
            'Distinguished',
            'Fellow',
        ];

        $timestamp = now();
        $records = [];

        foreach ($levels as $level) {
            $records[] = [
                'name' => $level,
                'slug' => Str::slug($level),
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ];
        }

        DB::table('levels')->insert($records);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('levels');
    }
};
