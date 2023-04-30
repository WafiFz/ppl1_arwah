<?php

namespace Modules\Wedding\database\factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class WeddingLoveStoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Wedding\Entities\WeddingLoveStory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'story' => $this->faker->paragraph(),
            'image' => $this->faker->imageUrl(480, 640, 'weddings', true),
        ];
    }
}

