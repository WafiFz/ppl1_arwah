<?php

namespace Modules\Invitation\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

// Entities
use Modules\Invitation\Entities\Invitation;
use Modules\Invitation\Entities\Guest;

class RsvpFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Invitation\Entities\Rsvp::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $invitation = Invitation::inRandomOrder()->first();
        $guest = Guest::inRandomOrder()->first();

        return [
            "name"          => $guest->name,
            "amount_guest"  => (int)random_int(0, 20),
            "is_attend"     => (bool)random_int(0, 1),
            "invitation_id" => $invitation->id,
            "guest_id"      => $guest->id,
        ];
    }
}

