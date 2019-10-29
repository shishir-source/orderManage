<?php

namespace Modules\Booking\Entities;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Modules\Booking\Entities\BookingDetails;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Core\Eloquent\Model;
use Carbon\Carbon;

class Booking extends Model
{
  use SoftDeletes;

	/**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
	    'type', 'booking_id', 'user_id', 'status'
	  ];

	/**
   * Get the Booking Details for the Booking details.
   */
  public function bookingDetails()
  {
    return $this->hasMany("Modules\Booking\Entities\BookingDetails");
  }
  /**
   * Get the Booking Details for the Booking details.
   */
  public function approvedBookingDetails()
  {
    return $this->hasMany("Modules\Booking\Entities\BookingDetails")->where('is_admin_aproved',true);
  }

  /**
   * Generate Booking Order number.
   */
  public static function generateOrderNumber()
  {
    return Carbon::today()->format('Ymd')."0000".static::count()+1;
  }

  /**
   * Latest Booking Order number.
   */
  public static function getLatest()
  {
    return static::select('booking_id')->get();
  }

  /**
   * Generate Booking Order number.
   */
  public static function getAdminBooking($id= null, $booking_id =null, $paginate = true)
  {
   
    if($paginate) {
      return static::with('approvedBookingDetails')->where('status',"process")->paginate();
    }

    if(is_array($booking_id)) {
       // print_r("<pre>");
    // print_r($booking_id);die();
      return static::with('approvedBookingDetails')->whereIn('booking_id',$booking_id)->get();
    }

    if(!is_array($booking_id)) {
      return static::with('approvedBookingDetails')->where('booking_id',$booking_id)->first();
    }
    return static::with('approvedBookingDetails')->where('id',$id)->first();
  }

  /**
   * Generate Booking Order number.
   */
  public static function getById($id)
  {
    return static::with('bookingDetails')->where('id',$id)->first();
  }

  /**
   * Generate Booking Order number.
   */
  public function getStatusAttribute($status)
  {
    return ucfirst($status);
  }

  /**
   * get Booking Order number.
   */
  public static function getBookingNumbers()
  {
    return static::select('booking_id')->where('status','process')->get();
  }

}
