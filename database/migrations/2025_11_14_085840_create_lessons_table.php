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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')
                  ->constrained()
                  ->cascadeOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->string('video_url')->nullable();
            $table->unsignedInteger('order')->default(1);
            $table->boolean('is_published')->default(false);
            $table->time('duration')->nullable();
            $table->boolean('free')->default(false);
            $table->timestamps();
        });

        // Insert 20 lesson records
        $now = now();
        $lessons = [
            [
                'course_id' => 1,
                'title' => 'Introduction to Laravel Framework',
                'description' => 'Overview of Laravel and its ecosystem',
                'content' => 'Learn about Laravel features, MVC architecture, and why Laravel is popular.',
                'video_url' => 'https://example.com/videos/laravel-intro.mp4',
                'order' => 1,
                'is_published' => true,
                'duration' => '00:15:30',
                'free' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'course_id' => 1,
                'title' => 'Setting Up Laravel Environment',
                'description' => 'Install and configure Laravel development environment',
                'content' => 'Step by step guide to install Composer, PHP, and Laravel on your machine.',
                'video_url' => 'https://example.com/videos/laravel-setup.mp4',
                'order' => 2,
                'is_published' => true,
                'duration' => '00:20:45',
                'free' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'course_id' => 1,
                'title' => 'Laravel Routing Basics',
                'description' => 'Understanding routes and URL handling',
                'content' => 'Learn how to define routes, route parameters, and route groups in Laravel.',
                'video_url' => 'https://example.com/videos/laravel-routing.mp4',
                'order' => 3,
                'is_published' => true,
                'duration' => '00:18:20',
                'free' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'course_id' => 2,
                'title' => 'PHP Namespaces and Autoloading',
                'description' => 'Master PHP namespaces and PSR-4 autoloading',
                'content' => 'Deep dive into PHP namespaces, use statements, and Composer autoloading.',
                'video_url' => 'https://example.com/videos/php-namespaces.mp4',
                'order' => 1,
                'is_published' => true,
                'duration' => '00:25:15',
                'free' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'course_id' => 2,
                'title' => 'Advanced OOP Patterns',
                'description' => 'Design patterns in PHP',
                'content' => 'Learn Singleton, Factory, Strategy, and Observer patterns in PHP.',
                'video_url' => 'https://example.com/videos/php-patterns.mp4',
                'order' => 2,
                'is_published' => true,
                'duration' => '00:35:40',
                'free' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'course_id' => 3,
                'title' => 'JavaScript Variables and Data Types',
                'description' => 'Understanding JavaScript fundamentals',
                'content' => 'Learn about var, let, const, and JavaScript primitive and reference types.',
                'video_url' => 'https://example.com/videos/js-variables.mp4',
                'order' => 1,
                'is_published' => true,
                'duration' => '00:12:30',
                'free' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'course_id' => 3,
                'title' => 'Functions and Closures',
                'description' => 'JavaScript functions in depth',
                'content' => 'Master function declarations, expressions, arrow functions, and closures.',
                'video_url' => 'https://example.com/videos/js-functions.mp4',
                'order' => 2,
                'is_published' => true,
                'duration' => '00:22:10',
                'free' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'course_id' => 4,
                'title' => 'React Components and Props',
                'description' => 'Building blocks of React applications',
                'content' => 'Learn how to create functional and class components, pass props, and composition.',
                'video_url' => 'https://example.com/videos/react-components.mp4',
                'order' => 1,
                'is_published' => true,
                'duration' => '00:28:45',
                'free' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'course_id' => 4,
                'title' => 'React Hooks - useState and useEffect',
                'description' => 'Essential React hooks for state and side effects',
                'content' => 'Deep dive into useState and useEffect hooks with practical examples.',
                'video_url' => 'https://example.com/videos/react-hooks.mp4',
                'order' => 2,
                'is_published' => true,
                'duration' => '00:32:20',
                'free' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'course_id' => 5,
                'title' => 'Python Basics and Syntax',
                'description' => 'Getting started with Python programming',
                'content' => 'Learn Python syntax, indentation, variables, and basic data structures.',
                'video_url' => 'https://example.com/videos/python-basics.mp4',
                'order' => 1,
                'is_published' => true,
                'duration' => '00:16:55',
                'free' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'course_id' => 5,
                'title' => 'NumPy for Data Analysis',
                'description' => 'Working with arrays and numerical data',
                'content' => 'Master NumPy arrays, operations, broadcasting, and array manipulation.',
                'video_url' => 'https://example.com/videos/numpy-basics.mp4',
                'order' => 2,
                'is_published' => true,
                'duration' => '00:30:15',
                'free' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'course_id' => 6,
                'title' => 'Vue.js Instance and Data Binding',
                'description' => 'Understanding Vue.js reactive data',
                'content' => 'Learn Vue instance lifecycle, data properties, and two-way data binding.',
                'video_url' => 'https://example.com/videos/vue-instance.mp4',
                'order' => 1,
                'is_published' => true,
                'duration' => '00:19:40',
                'free' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'course_id' => 6,
                'title' => 'Vue Components and Props',
                'description' => 'Creating reusable Vue components',
                'content' => 'Build custom Vue components, pass data with props, and emit events.',
                'video_url' => 'https://example.com/videos/vue-components.mp4',
                'order' => 2,
                'is_published' => true,
                'duration' => '00:26:30',
                'free' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'course_id' => 7,
                'title' => 'Database Normalization',
                'description' => 'Understanding normal forms',
                'content' => 'Learn 1NF, 2NF, 3NF, and BCNF with practical examples.',
                'video_url' => 'https://example.com/videos/db-normalization.mp4',
                'order' => 1,
                'is_published' => true,
                'duration' => '00:24:50',
                'free' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'course_id' => 8,
                'title' => 'REST API Design Principles',
                'description' => 'Best practices for RESTful APIs',
                'content' => 'Learn REST constraints, HTTP methods, status codes, and resource naming.',
                'video_url' => 'https://example.com/videos/rest-principles.mp4',
                'order' => 1,
                'is_published' => true,
                'duration' => '00:21:35',
                'free' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'course_id' => 8,
                'title' => 'API Authentication with JWT',
                'description' => 'Securing APIs with JSON Web Tokens',
                'content' => 'Implement JWT authentication for secure API access.',
                'video_url' => 'https://example.com/videos/jwt-auth.mp4',
                'order' => 2,
                'is_published' => true,
                'duration' => '00:27:20',
                'free' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'course_id' => 9,
                'title' => 'Docker Images and Containers',
                'description' => 'Understanding Docker fundamentals',
                'content' => 'Learn Docker architecture, images, containers, and basic commands.',
                'video_url' => 'https://example.com/videos/docker-basics.mp4',
                'order' => 1,
                'is_published' => true,
                'duration' => '00:23:45',
                'free' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'course_id' => 10,
                'title' => 'Git Basics - Init, Add, Commit',
                'description' => 'Getting started with Git',
                'content' => 'Learn basic Git workflow, staging changes, and committing code.',
                'video_url' => 'https://example.com/videos/git-basics.mp4',
                'order' => 1,
                'is_published' => true,
                'duration' => '00:14:25',
                'free' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'course_id' => 10,
                'title' => 'Git Branching and Merging',
                'description' => 'Working with Git branches',
                'content' => 'Master branch creation, switching, merging, and conflict resolution.',
                'video_url' => 'https://example.com/videos/git-branching.mp4',
                'order' => 2,
                'is_published' => true,
                'duration' => '00:19:50',
                'free' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'course_id' => 11,
                'title' => 'Express.js Setup and Middleware',
                'description' => 'Building APIs with Express.js',
                'content' => 'Set up Express server, understand middleware, and handle requests.',
                'video_url' => 'https://example.com/videos/express-setup.mp4',
                'order' => 1,
                'is_published' => true,
                'duration' => '00:20:30',
                'free' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('lessons')->insert($lessons);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
