<?php

namespace Modules\Theme\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Theme extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'themes';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Theme\database\factories\ThemeFactory::new();
    }
}
