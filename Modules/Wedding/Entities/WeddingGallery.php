<?php

namespace Modules\Wedding\Entities;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class WeddingGallery extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'wedding_galleries';
    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Wedding\Database\factories\WeddingGalleryFactory::new();
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
