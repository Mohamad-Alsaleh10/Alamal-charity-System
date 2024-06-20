<?php

use App\Employee;
use App\Training;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create employees
        $employees = factory(Employee::class, 10)->create();

        // Create trainings
        $trainings = factory(Training::class, 5)->create();

        // Attach employees to trainings
        foreach ($trainings as $training) {
            $training->participants()->attach(
                $employees->random(rand(2, 5))->pluck('id')->toArray()
            );
        }
    }
}
