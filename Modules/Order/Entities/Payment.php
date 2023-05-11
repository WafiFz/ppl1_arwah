<?php

namespace Modules\Order\Entities;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'payments';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        // return \Modules\Order\database\factories\PaymentFactory::new();
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

    /**
    *
    *  METHOD
    *
    * ---------------------------------------------------------------------
    */

    /**
     * Midtrans Payment
     *
     * @return 
     */
    public static function midtrans($user, $order, $payment)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $payment->total_price,
            ),
            'customer_details' => array(
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'phone' => $user->mobile,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return  $snapToken;
    }
}
