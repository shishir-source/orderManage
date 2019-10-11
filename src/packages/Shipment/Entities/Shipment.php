<?php

namespace Modules\Shipment\Entities;

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
    'user_id', 'booking_details_id', 'booking_number', 'shipment_no', 'status'
  	];

  /**
   * Get the Booking that owns the Bookings.
   */
  public function bookingDetails()
  {
    return $this->hasMany("Modules\Booking\Entities\BookingDetails",'id','booking_details_id');
  }
}