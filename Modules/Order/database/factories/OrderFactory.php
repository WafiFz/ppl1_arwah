<?php

namespace Modules\Order\database\factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

// Entities
use App\Models\User;
use Modules\Package\Entities\Package;
use Modules\Theme\Entities\Theme;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Order\Entities\Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = collect(['PAID', 'UNPAID']);
        $user = User::inRandomOrder()->first();
        $package = Package::inRandomOrder()->first();
        $theme = Theme::where('package_id', '=', $package->id)->inRandomOrder()->first();

        while(!$theme){
            $package = Package::inRandomOrder()->first();
            $theme = Theme::where('package_id', '=', $package->id)->inRandomOrder()->first();
        }

        return [
            'status'            => $status->random(),
            'user_id'           => $user->id,
            'package_id'        => $package->id,
            'theme_id'          => $theme->id,
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ];
    }
}
