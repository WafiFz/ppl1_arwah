<?php

namespace Modules\Wedding\database\factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class WeddingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Wedding\Entities\Wedding::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
    
        return [
            'title'             => substr($this->faker->text(15), 0, -1),
            'location'          => $this->faker->address(),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ];
    }
}
