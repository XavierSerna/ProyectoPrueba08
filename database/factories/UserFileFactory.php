<?php

namespace Database\Factories;

use App\Models\UserFile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserFile>
 */
class UserFileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isFolder = $this->faker->boolean(20); // 20%
        $isChild = !$isFolder && $this->faker->boolean(80);
        $parent = $isChild ? UserFile::where('type', 'folder')->inRandomOrder()->first() : null ; // if children then get random parent

        return [
            'parent_id' => $parent ? $parent->id : null,

            'user_id' => null,
            'file_name' => $this->faker->word,
            'file_path' => $this->faker->filePath(),

            'size' => $isFolder ? null : $this->faker->numberBetween(1000, 100000),
            'type' => $isFolder ? 'folder' : $this->faker->fileExtension(),
            'file_count' => $isFolder ? $this->faker->numberBetween(0, 10) : null,
        ];
    }
}
