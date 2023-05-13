<?php

namespace Modules\Theme\database\factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

// Entities
use Modules\Package\Entities\Package;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ThemeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Theme\Entities\Theme::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = substr($this->faker->text(10), 0, -1);
        $slug = Str::slug($name, '-');
        $package = Package::inRandomOrder()->first();
        $package_id = $package->id;


        return [
            'package_id'        => $package_id,
            'name'              => $name,
            'slug'              => $slug,
            'img_preview'       => "https://mdbootstrap.com/img/new/standard/nature/184.jpg",
            'description'       => $this->faker->paragraph,
            'price'             => $this->faker->numberBetween(50000, 500000),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ];
    }
}
