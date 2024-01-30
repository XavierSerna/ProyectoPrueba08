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
        $isFolder = $this->faker->boolean; // 50% is or isn't
        $fileExtension = $this->faker->fileExtension; // Extension for files
        $fileType = $isFolder ? 'folder' : $fileExtension; // 'folder' or fileExtension

        return [
            'user_id' => null,
            'file_name' => $isFolder ? $this->faker->word : $this->faker->word . '.' . $fileExtension,
            'file_path' => $this->faker->filePath,
            'size' => $isFolder ? null : $this->faker->numberBetween(1000, 1000000), // Size if file, null if isFolder
            'type' => $fileType,
            'file_count' => $isFolder ? $this->faker->numberBetween(0, 50) : null, // Quantity if isFolder, null if not
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
