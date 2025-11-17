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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->boolean('paid')->default(true);
            $table->decimal('price', 8, 2)->nullable();
            $table->decimal('discount', 8, 2)->nullable();
            $table->date('discount_expire')->nullable();
            $table->enum('status', ['published','unpublished'])->default('published');
            $table->foreignId('level_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // Insert 20 course records
        $now = now();
        $courses = [
            [
                'title' => 'Introduction to Laravel',
                'slug' => 'introduction-to-laravel',
                'description' => 'Learn the fundamentals of Laravel framework and build modern web applications.',
                'paid' => true,
                'price' => 99.99,
                'discount' => 79.99,
                'discount_expire' => now()->addDays(30)->format('Y-m-d'),
                'status' => 'published',
                'level_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Advanced PHP Programming',
                'slug' => 'advanced-php-programming',
                'description' => 'Master advanced PHP concepts and design patterns for enterprise applications.',
                'paid' => true,
                'price' => 129.99,
                'discount' => null,
                'discount_expire' => null,
                'status' => 'published',
                'level_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'JavaScript Essentials',
                'slug' => 'javascript-essentials',
                'description' => 'Complete guide to modern JavaScript from basics to advanced topics.',
                'paid' => false,
                'price' => null,
                'discount' => null,
                'discount_expire' => null,
                'status' => 'published',
                'level_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'React Development Bootcamp',
                'slug' => 'react-development-bootcamp',
                'description' => 'Build scalable React applications with hooks, context, and best practices.',
                'paid' => true,
                'price' => 149.99,
                'discount' => 119.99,
                'discount_expire' => now()->addDays(15)->format('Y-m-d'),
                'status' => 'published',
                'level_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Python for Data Science',
                'slug' => 'python-for-data-science',
                'description' => 'Learn Python programming with focus on data analysis and visualization.',
                'paid' => true,
                'price' => 109.99,
                'discount' => null,
                'discount_expire' => null,
                'status' => 'published',
                'level_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Vue.js Complete Guide',
                'slug' => 'vuejs-complete-guide',
                'description' => 'Master Vue.js framework and build interactive user interfaces.',
                'paid' => true,
                'price' => 89.99,
                'discount' => 69.99,
                'discount_expire' => now()->addDays(20)->format('Y-m-d'),
                'status' => 'published',
                'level_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Database Design Fundamentals',
                'slug' => 'database-design-fundamentals',
                'description' => 'Learn how to design efficient and scalable database schemas.',
                'paid' => false,
                'price' => null,
                'discount' => null,
                'discount_expire' => null,
                'status' => 'published',
                'level_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'RESTful API Development',
                'slug' => 'restful-api-development',
                'description' => 'Build professional RESTful APIs with authentication and best practices.',
                'paid' => true,
                'price' => 119.99,
                'discount' => null,
                'discount_expire' => null,
                'status' => 'published',
                'level_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Docker and Containerization',
                'slug' => 'docker-and-containerization',
                'description' => 'Master Docker containers and deploy applications efficiently.',
                'paid' => true,
                'price' => 99.99,
                'discount' => 79.99,
                'discount_expire' => now()->addDays(10)->format('Y-m-d'),
                'status' => 'published',
                'level_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Git Version Control',
                'slug' => 'git-version-control',
                'description' => 'Learn Git and GitHub for effective version control and collaboration.',
                'paid' => false,
                'price' => null,
                'discount' => null,
                'discount_expire' => null,
                'status' => 'published',
                'level_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Node.js Backend Development',
                'slug' => 'nodejs-backend-development',
                'description' => 'Build fast and scalable backend applications with Node.js and Express.',
                'paid' => true,
                'price' => 139.99,
                'discount' => null,
                'discount_expire' => null,
                'status' => 'published',
                'level_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'TypeScript Masterclass',
                'slug' => 'typescript-masterclass',
                'description' => 'Master TypeScript and build type-safe JavaScript applications.',
                'paid' => true,
                'price' => 94.99,
                'discount' => 74.99,
                'discount_expire' => now()->addDays(25)->format('Y-m-d'),
                'status' => 'published',
                'level_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'CSS and Responsive Design',
                'slug' => 'css-and-responsive-design',
                'description' => 'Create beautiful responsive websites with modern CSS techniques.',
                'paid' => false,
                'price' => null,
                'discount' => null,
                'discount_expire' => null,
                'status' => 'published',
                'level_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'MongoDB Database Course',
                'slug' => 'mongodb-database-course',
                'description' => 'Learn NoSQL database development with MongoDB.',
                'paid' => true,
                'price' => 79.99,
                'discount' => null,
                'discount_expire' => null,
                'status' => 'published',
                'level_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'AWS Cloud Computing',
                'slug' => 'aws-cloud-computing',
                'description' => 'Deploy and manage applications on Amazon Web Services cloud platform.',
                'paid' => true,
                'price' => 159.99,
                'discount' => 129.99,
                'discount_expire' => now()->addDays(30)->format('Y-m-d'),
                'status' => 'published',
                'level_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'GraphQL API Development',
                'slug' => 'graphql-api-development',
                'description' => 'Build flexible and efficient APIs using GraphQL.',
                'paid' => true,
                'price' => 109.99,
                'discount' => null,
                'discount_expire' => null,
                'status' => 'published',
                'level_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Testing and Quality Assurance',
                'slug' => 'testing-and-quality-assurance',
                'description' => 'Learn unit testing, integration testing, and TDD practices.',
                'paid' => true,
                'price' => 89.99,
                'discount' => null,
                'discount_expire' => null,
                'status' => 'unpublished',
                'level_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Angular Framework Guide',
                'slug' => 'angular-framework-guide',
                'description' => 'Build enterprise-level applications with Angular framework.',
                'paid' => true,
                'price' => 144.99,
                'discount' => 114.99,
                'discount_expire' => now()->addDays(20)->format('Y-m-d'),
                'status' => 'published',
                'level_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Web Security Essentials',
                'slug' => 'web-security-essentials',
                'description' => 'Protect your web applications from common security vulnerabilities.',
                'paid' => true,
                'price' => 124.99,
                'discount' => null,
                'discount_expire' => null,
                'status' => 'published',
                'level_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'DevOps and CI/CD',
                'slug' => 'devops-and-cicd',
                'description' => 'Implement continuous integration and deployment pipelines.',
                'paid' => true,
                'price' => 134.99,
                'discount' => 104.99,
                'discount_expire' => now()->addDays(15)->format('Y-m-d'),
                'status' => 'published',
                'level_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('courses')->insert($courses);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
