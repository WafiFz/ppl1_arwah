<?php

namespace Modules\Wedding\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WishFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Wedding\Entities\Wish::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'from' => substr($this->faker->text(15), 0, -1),
            'wish' => $this->faker->paragraph(),
        ];
    }
}

