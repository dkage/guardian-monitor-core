<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\TaskComment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TaskComment>
 */
class TaskCommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'comment' => $this->faker->sentence,
            'task_id' => $this->faker->numberBetween(1, Task::count()),
            'attachment' => $this->faker->randomElement([$this->faker->filePath(), null]),
            'user_id' => $this->faker->numberBetween(1, User::count()),
        ];
    }
}
