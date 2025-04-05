<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Student;
use App\Models\Instructor;
use App\Models\Course;
use App\Models\Enrolment;
use App\Models\CourseFee;

class CoursesSeeder extends Seeder
{
    public function run(): void
    {
        // Create Instructor User
        $instructorUser = User::create([
            'name' => 'John Instructor',
            'email' => 'instructor@example.com',
            'password' => Hash::make('password'),
            'role' => 'instructor',
        ]);

        // Create Instructor
        $instructor = Instructor::create([
            'user_id' => $instructorUser->id,
            'expertise' => 'Mathematics',
        ]);

        // Create Parent User
        $parentUser = User::create([
            'name' => 'Alice Parent',
            'email' => 'parent@example.com',
            'password' => Hash::make('password'),
            'role' => 'parent',
        ]);

        // Create Student User
        $studentUser = User::create([
            'name' => 'Bob Student',
            'email' => 'student@example.com',
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        // Create Student
        $student = Student::create([
            'user_id' => $studentUser->id,
            'parent_id' => $parentUser->id,
        ]);

        // Create Course
        $course = Course::create([
            'name' => 'Algebra Basics',
            'description' => 'Introductory course on Algebra.',
            'syllabus' => 'Syllabus content here...',
            'instructor_id' => $instructorUser->id,
            'status' => 1,
        ]);

        // Create Course Fee
        CourseFee::create([
            'course_id' => $course->id,
            'course_duration' => '3 Months',
            'price' => 5000,
            'discount' => 10.00,
            'payment_plan' => 'Monthly',
        ]);

        // Enrol Student
        Enrolment::create([
            'student_id' => $studentUser->id,
            'course_id' => $course->id,
            'status' => 'active',
        ]);
    }
}
