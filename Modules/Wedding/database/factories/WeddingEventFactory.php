<?php

namespace Modules\Wedding\database\factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class WeddingEventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Wedding\Entities\WeddingEvent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date'              => $this->faker->date(),
            'start_time'        => $this->faker->time(),
            'end_time'          => $this->faker->time(),
            'place'             => $this->faker->address(),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ];
    }
}

