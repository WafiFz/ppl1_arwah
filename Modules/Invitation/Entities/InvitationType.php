<?php

namespace Modules\Invitation\Entities;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvitationType extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'invitation_types';

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Invitation\database\factories\InvitationTypeFactory::new();
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
        return $this->hasMany('Modules\Invitation\Entities\Invitation');
    }
}
