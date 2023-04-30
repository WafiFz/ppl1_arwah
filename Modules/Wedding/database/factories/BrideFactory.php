<?php

namespace Modules\Wedding\database\factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrideFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Wedding\Entities\Bride::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'              => $this->faker->name(),
            'father'            => $this->faker->name(),
            'mother'            => $this->faker->name(),
            'address'           => $this->faker->address(),
            'instagram'         => $this->faker->userName(),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ];
    }
}

