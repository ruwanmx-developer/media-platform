<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('address', 300);
            $table->string('mobile', 10);
            $table->string('district', 50);
            $table->string('description');
            $table->string('role');
            $table->string('state')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        User::create([
            'name' => 'Mix Media',
            'email' => 'admin@gmail.com',
            'address' => '123 Main St',
            'mobile' => '0754378234',
            'district' => 'Kalutara',
            'description' => 'Lorem ipsum dolor sit amet',
            'role' => '0',
            'password' => bcrypt('admin123@'),
        ]);

        User::create([
            'name' => 'John Doe',
            'email' => 'user@gmail.com',
            'address' => '123 Main St',
            'mobile' => '1234567890',
            'district' => 'New York',
            'description' => 'Lorem ipsum dolor sit amet',
            'role' => '1',
            'password' => bcrypt('admin123@'),
        ]);

        User::create([
            'name' => 'John Doe',
            'email' => 'mentor@gmail.com',
            'address' => '123 Main St',
            'mobile' => '1234567890',
            'district' => 'New York',
            'description' => 'Lorem ipsum dolor sit amet',
            'role' => '2',
            'password' => bcrypt('admin123@'),
        ]);

        User::create([
            'name' => 'John Doe',
            'email' => 'company@gmail.com',
            'address' => '123 Main St',
            'mobile' => '1234567890',
            'district' => 'New York',
            'description' => 'Lorem ipsum dolor sit amet',
            'role' => '3',
            'password' => bcrypt('admin123@'),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
