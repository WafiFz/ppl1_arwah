<?php

namespace Modules\Invitation\database\factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

// Entities
use App\Models\User;
use Modules\Order\Entities\Order;
use Modules\Invitation\Entities\InvitationType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class InvitationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Invitation\Entities\Invitation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = collect(['ACTIVE', 'INACTIVE', 'INCOMPLETE']);
        $user = User::inRandomOrder()->first();
        $invitation_type = InvitationType::inRandomOrder()->first();
        $slug = Str::slug($user->name, '-') . Str::random();
        $is_custom_domain = (bool)random_int(0, 1);
        ($is_custom_domain) ? $custom_domain = 'Link' : $custom_domain = null;  

        return [
            'user_id'               => $user->id,
            'invitation_type_id'    => $invitation_type->id,
            'status'                => $status->random(),
            'slug'                  => $slug,
            'is_custom_domain'      => $is_custom_domain,
            'custom_domain'         => $custom_domain,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ];
    }
}
