<?php

namespace Modules\Invitation\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

// Entities
use Modules\Invitation\Entities\Invitation;

class GuestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Invitation\Entities\Guest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $invitation = Invitation::inRandomOrder()->first();

        return [
            "name" => $this->faker->name(),
            "description" => substr($this->faker->text(25), 0, -1),
            "is_invited" => (bool)random_int(0, 1),
            "address" => $this->faker->paragraph,
            "no_whats_app" => $this->faker->e164PhoneNumber,
            "email" => $this->faker->email,
            "invitation_id" => $invitation->id,
        ];
    }
}

