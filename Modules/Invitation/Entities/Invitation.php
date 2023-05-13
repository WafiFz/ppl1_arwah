<?php

namespace Modules\Invitation\Entities;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invitation extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'invitations';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Invitation\database\factories\InvitationFactory::new();
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

    // Order
    public function order()
    {
        return $this->belongsTo('Modules\Order\Entities\Order');
    }

    // Invitaion Type
    public function type()
    {
        return $this->belongsTo('Modules\Invitation\Entities\InvitationType');
    }

    // Wedding
    public function wedding()
    {
        return $this->hasOne('Modules\Wedding\Entities\Wedding');
    }

    // Guest
    public function guest()
    {
        return $this->hasMany('Modules\Invitation\Entities\Guest');
    }

    // RSVP
    public function rsvp()
    {
        return $this->hasMany('Modules\Invitation\Entities\Rsvp');
    }

    /**
     *
     *  METHOD
     *
     * ---------------------------------------------------------------------
     */
}
