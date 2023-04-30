<?php

namespace Modules\Invitation\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rsvp extends Model
{
    use HasFactory;

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
