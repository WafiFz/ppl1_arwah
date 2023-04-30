<?php

namespace Modules\Wedding\Entities;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bride extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'brides';
    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Wedding\Database\factories\BrideFactory::new();
    }

    /**
    *
    *  RELATION
    *
    * ---------------------------------------------------------------------
    */

    // Wedding
    public function wedding()
    {
        return $this->belongsTo('Modules\Wedding\Entities\Wedding');
    }

    /**
    *
    *  METHOD
    *
    * ---------------------------------------------------------------------
    */
}
