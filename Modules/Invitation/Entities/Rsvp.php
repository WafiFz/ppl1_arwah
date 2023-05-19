<?php

namespace Modules\Invitation\Entities;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rsvp extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'rsvps';

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Invitation\database\factories\RsvpFactory::new();
    }

    /**
    *
    *  RELATION
    *
    * ---------------------------------------------------------------------
    */

    // Invitation
    public function invitation()
    {
        return $this->belongsTo('Modules\Invitation\Entities\Invitation');
    }

    /**
    *
    *  METHOD
    *
    * ---------------------------------------------------------------------
    */
}
