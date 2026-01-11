<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Ville;
use App\Models\Specialite;
use App\Models\Etudiant;
use App\Models\Matiere;
use App\Models\Inscription;
use App\Models\Note;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@gestion.test',
            'password' => Hash::make('password'),
        ]);

        // Create test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        $this->command->info('Creating cities...');
        // Create 15 cities
        Ville::factory()->count(15)->create();

        $this->command->info('Creating specialties...');
        // Create 8 specialties
        Specialite::factory()->count(8)->create();

        $this->command->info('Creating students...');
        // Create 50 students
        Etudiant::factory()->count(50)->create();

        $this->command->info('Creating subjects...');
        // Create 20 subjects
        Matiere::factory()->count(20)->create();

        $this->command->info('Creating enrollments...');
        // Create 80 enrollments (some students have multiple enrollments)
        Inscription::factory()->count(80)->create();

        $this->command->info('Creating grades...');
        // Create 200 grades
        Note::factory()->count(200)->create();

        $this->command->info('Database seeded successfully!');
        $this->command->warn('Login credentials:');
        $this->command->line('Email: admin@gestion.test');
        $this->command->line('Password: password');
    }
}
