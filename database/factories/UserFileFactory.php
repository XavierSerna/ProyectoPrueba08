<?php

namespace Database\Factories;

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
        return [
            'user_id' => null,
            'file_name' => $this->faker->word . '.' . $this->faker->fileExtension,
            'file_path' => $this->faker->filePath,
            'is_public' => $this->faker->boolean,
            'allowed_user_ids' => json_encode([$this->faker->randomNumber()]),
            'categories' => json_encode([$this->faker->word]),
            'upload' => json_encode([$this->faker->imageUrl()]),
            'description' => $this->faker->paragraph,
            'public_key' => $this->faker->md5,
            'tags' => json_encode([$this->faker->word]),
            'fav' => $this->faker->boolean
        ];
    }
}
