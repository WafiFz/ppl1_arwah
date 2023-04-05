<?php

namespace Modules\Wedding\Models;

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
}
