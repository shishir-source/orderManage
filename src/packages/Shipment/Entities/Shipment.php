<?php

namespace Modules\Shipment\Entities;

use DB;
use Carbon\Carbon;
use Modules\Core\Eloquent\Model;
use Modules\Booking\Entities\Booking;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipment extends Model
{
  use SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'user_id', 'booking_details_id', 'booking_number', 'shipment_no', 'status', 'quantity', 'order_no'
  	];

  /**
   *
   */
  public static function list() {
    return static::with('bookingDetails')->select("*", DB::Raw("SUM(quantity) as quantity"))->orderBy('updated_at','DESC')->groupBy("shipment_no")->paginate();
  }
  /**
   * Get the Booking that owns the Bookings.
   */
  public function bookingDetails()
  {
    return $this->hasOne("Modules\Booking\Entities\BookingDetails",'id','booking_details_id');
  }

  public static function getSumQtyByBookingDetailsId($id) {
    return static::where('booking_details_id',$id)->sum('quantity');
  }

  public static function getByShipmentNo($shipment_no) {
    return static::with('bookingDetails')->where('shipment_no',$shipment_no)->get();
  }
  /**
   * Get the Booking that owns the Bookings.
   */
  public static function generateShipmentNo()
  {
    return Carbon::today()->format('Ymd')."0000".static::withTrashed()->count() + 1;;
  }
}