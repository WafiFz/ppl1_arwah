<?php

namespace Modules\Invitation\Entities;

use Carbon\Carbon;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

// Entities
use Modules\Wedding\Entities\Wedding;
use Modules\Wedding\Entities\Bride;
use Modules\Wedding\Entities\Groom;
use Modules\Wedding\Entities\WeddingEvent;

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

    public static function initWeddingInvitation($order){
        $invitation = Invitation::create([
            'user_id'               => auth()->user()->id,
            'invitation_type_id'    => 1,
            'status'                => 'INCOMPLETE',
            'slug'                  => Str::slug(auth()->user()->name . " " . Str::random(10), '-'),
            'is_custom_domain'      => false,
            'order_id'              => $order->id,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        $wedding = Wedding::create([
            'invitation_id'         => $invitation->id,
        ]);

        Bride::create([
            'wedding_id'         => $wedding->id,
        ]);

        Groom::create([
            'wedding_id'         => $wedding->id,
        ]);

        WeddingEvent::create([
            'wedding_id'         => $wedding->id,
            'name'               => 'Akad Nikah',
        ]);

        WeddingEvent::create([
            'wedding_id'         => $wedding->id,
            'name'               => 'Resepsi',
        ]);

        WeddingEvent::create([
            'wedding_id'         => $wedding->id,
            'name'               => 'Unduh Mantu',
        ]);

    }

    public static function getBySlug($slug){
        return Invitation::where('slug', $slug)->first();
    }
}
