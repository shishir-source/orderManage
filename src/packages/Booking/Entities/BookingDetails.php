<?php

namespace Modules\Booking\Entities;

use Modules\User\Entities\User;
use Modules\Core\Eloquent\Model;
use Modules\Booking\Entities\Booking;
use Modules\Shipment\Entities\Shipment;
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
    'booking_id', 'shipment_no','is_admin_aproved', 'is_aproved_user_id',


      'name','link','price','offer','quantity','note','is_draft', 'status', 'order_no'
  	];

  public static function getOrderNo(){
    return static::select('order_no')->where('is_admin_aproved', true)->groupBy('order_no')->get();
  }
  /**
   * Scope a query to only include popular users.
   *
   * @param  \Illuminate\Database\Eloquent\Builder  $query
   * @return \Illuminate\Database\Eloquent\Builder
   */
  public function scopeDraftBooking($query)
  {
    return $query->where('is_draft',true);
  }
  
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
  public static function adminApproved( array $ids = [], array $order_no = null) {

    if( count($ids) > 0) {
      foreach ($ids as $key => $id) {
        static::findOrFail($id)->update([
            'order_no' => isset($order_no[$key]) ? $order_no[$key] :'',
            'is_admin_aproved' => true,
            'is_aproved_user_id' => auth_user()->id
          ]);
      }

      return true;
    }

    return false;
    
  }

  /**
   * Generate Booking Order number.
   */
  public static function getBookingForShipment($order_no)
  {
    if(! is_array($order_no)) {
      $order_no = explode(", ", $order_no);
    }

    $data = static::with('booking')->whereIn('order_no',(array) $order_no)->whereNotNull('order_no')->get();

    Booking::putShipemtQantity($data);
    return $data;
  }

  /**
   * Generate Booking Order number.
   */
  public function getStatusAttribute($status)
  {
    return ucfirst($status);
  }
  
  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
      'is_draft' => 'boolean',
      'is_shipment' => 'boolean',
      'is_admin_aproved' => 'boolean',
  ];
}