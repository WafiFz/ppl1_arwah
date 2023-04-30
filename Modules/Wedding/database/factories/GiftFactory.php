<?php

namespace Modules\Wedding\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GiftFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Wedding\Entities\Gift::class;

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
            'nominal' => $this->faker->numberBetween(50000, 500000),
        ];
    }
}

