<?php

namespace Modules\Wedding\Entities;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wedding extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'weddings';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Wedding\database\factories\WeddingFactory::new();
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

    // Groom
    public function groom()
    {
        return $this->hasOne('Modules\Wedding\Entities\Groom');
    }

    // Bride
    public function bride()
    {
        return $this->hasOne('Modules\Wedding\Entities\Bride');
    }

    // Wish
    public function wish()
    {
        return $this->hasMany('Modules\Wedding\Entities\Wish');
    }

    // Wish
    public function gift()
    {
        return $this->hasMany('Modules\Wedding\Entities\Gift');
    }

    // Wedding Event
    public function event()
    {
        return $this->hasMany('Modules\Wedding\Entities\WeddingEvent');
    }

    // Wedding Love Story
    public function love_story()
    {
        return $this->hasMany('Modules\Wedding\Entities\WeddingLoveStory');
    }

    // Wedding Gallery
    public function gallery()
    {
        return $this->hasMany('Modules\Wedding\Entities\WeddingGallery');
    }

    /**
    *
    *  METHOD
    *
    * ---------------------------------------------------------------------
    */
}
