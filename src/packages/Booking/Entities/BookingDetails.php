<?php

namespace Modules\Booking\Entities;

use Modules\User\Entities\User;
use Modules\Core\Eloquent\Model;
use Modules\Booking\Entities\Booking;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingDetails extends Model
{
  use SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'booking_id', 'customer_name', 'date_of_purchase', 'purchasing_websites', 'items_order', 'status', 'order_value', 'conv_rate', 'currency_bill', 'booking_id', 'organic_currency_cost', 'shipping_rate', 'shipping_weight_g', 'shipping_bill', 'orgnaic_shipping_cost', 'customer_paid', 'payment_method', 'payment_reference', 'due', 'loss_or_disc', 'total_cost', 'currency_profit', 'shipping_profit', 'total_profit', 'remarks', 'shipment_no','is_admin_aproved', 'is_aproved_user_id'
  	];

  /**
   * Get the Booking that owns the Bookings.
   */
  public function booking()
  {
    return $this->belongsTo("Modules\Booking\Entities\Booking");
  }
  /**
   * Get the Booking that owns the Bookings.
   */
  public static function adminApproved( array $ids = []) {
    if( count($ids) > 0) {
      foreach ($ids as $key => $id) {
        static::findOrFail($id)->update([
            'is_admin_aproved' =>true,
            'is_aproved_user_id' => Sentinel::check()->id,
          ]);
      }

      return true;
    }

    return false;
    
  }

  /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_admin' => 'boolean',
        'is_shipment' => 'boolean',
    ];
}