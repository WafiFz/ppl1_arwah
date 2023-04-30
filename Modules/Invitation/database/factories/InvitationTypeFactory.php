<?php

namespace Modules\Invitation\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InvitationTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Invitation\Entities\InvitationType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type = collect(['WEDDING']);

        return [
            'type' => $type->random(),
        ];
    }
}

