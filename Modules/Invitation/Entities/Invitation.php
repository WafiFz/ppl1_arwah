<?php

namespace Modules\Invitation\Models;

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
}
