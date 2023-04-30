<?php

namespace Modules\Theme\Entities;

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

    /**
    *
    *  RELATION
    *
    * ---------------------------------------------------------------------
    */

    // Package
    public function package()
    {
        return $this->belongTo('Modules\Package\Entities\Package');
    }

    // Order
    public function order()
    {
        return $this->hasMany('Modules\Order\Entities\Order');
    }
}
