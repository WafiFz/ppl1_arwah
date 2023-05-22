<?php

namespace Modules\Order\Entities;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Order extends BaseModel
{
    use HasFactory;
    use SoftDeletes;
    use HasUuids;

    protected $table = 'orders';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Order\database\factories\OrderFactory::new();
    }

    /**
     *
     *  RELATION
     *
     * ---------------------------------------------------------------------
     */

    // User
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    // Package
    public function package()
    {
        return $this->belongsTo('Modules\Package\Entities\Package');
    }

    // Theme
    public function theme()
    {
        return $this->belongsTo('Modules\Theme\Entities\Theme');
    }

    // Invitation
    public function invitation()
    {
        return $this->hasOne('Modules\Invitation\Entities\Invitation');
    }

    // Payment
    public function payment()
    {
        return $this->hasOne('Modules\Order\Entities\Payment');
    }

    /**
     *
     *  METHOD
     *
     * ---------------------------------------------------------------------
     */
}
