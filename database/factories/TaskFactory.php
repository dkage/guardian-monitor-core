<?php

namespace Database\Factories;

use App\Models\Origin;
use App\Models\Priority;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $origin = $this->faker->numberBetween(0, Origin::count());
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'project_id' => $this->faker->numberBetween(1, Project::count()),
            'priority_id' => $this->faker->numberBetween(1, Priority::count()),
            'due_date' => $this->faker->date,
            'order' => $this->faker->randomDigit(),
            'completed' => false,
            'completed_at' => function (array $attributes) {
                return $attributes['completed'] ? $this->faker->dateTimeThisYear : null;
            },
            'origin_creation' => $origin == 0 ? null : $origin,
            'origin_completion' => $this->faker->randomElement([null, $origin == 0 ? null : $origin]),
            'color' => $this->faker->hexColor,
        ];
    }

    /**
     * Define the "completed" state.
     *
     * @return TaskFactory
     */
    public function completed(): TaskFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'completed' => true,
            ];
        });
    }
}

