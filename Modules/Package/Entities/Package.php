<?php

namespace Modules\Package\Entities;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'packages';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Package\database\factories\PackageFactory::new();
    }

    /**
    *
    *  RELATION
    *
    * ---------------------------------------------------------------------
    */

    // Order
    public function order()
    {
        return $this->hasMany('Modules\Order\Entities\Order');
    }

    // Theme
    public function theme()
    {
        return $this->hasMany('Modules\Theme\Entities\Theme');
    }

    /**
    *
    *  METHOD
    *
    * ---------------------------------------------------------------------
    */
}
