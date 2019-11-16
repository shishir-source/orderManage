<?php

namespace Modules\Booking\Entities;

use Modules\Booking\Entities\BookingDetails;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Shipment\Entities\Shipment;
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
	    'type', 'booking_id', 'user_id', 'status','is_draft',

      'loss_or_profit','order_reference','organic_cost','weight_charge','bsd_bill','customer_name', 'date_of_purchase', 'purchasing_websites', 'items_order', 'status', 'order_value', 'conv_rate', 'currency_bill', 'booking_id', 'organic_currency_cost', 'shipping_rate', 'shipping_weight_g', 'shipping_bill', 'orgnaic_shipping_cost', 'customer_paid', 'payment_method', 'payment_reference', 'due', 'loss_or_disc', 'total_cost', 'currency_profit', 'shipping_profit', 'total_profit', 'remarks',
	  ];

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
   * Scope a query to only include popular users.
   *
   * @param  \Illuminate\Database\Eloquent\Builder  $query
   * @return \Illuminate\Database\Eloquent\Builder
   */
  public function scopeUserId($query)
  {
    return $query->where('user_id', auth_user()->id);
  }

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
    return Carbon::today()->format('Ymd')."0000".static::withTrashed()->count() + 1;
  }

  public static function list() {
    return static::with('bookingDetails')->orderBy('updated_at','DESC')->paginate();
  }

  public static function draftList() {
    return static::userId()->draftBooking()->with('bookingDetails')->orderBy('updated_at','DESC')->paginate();
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
  public static function getAdminBooking($id = null, $booking_id = null, $paginate = true)
  {
    
    $data = array();

    if(is_null($id) && empty($booking_id) && $paginate) {
      $data = static::with('approvedBookingDetails')->where('status',"process")->paginate();
    }

    if(is_null($id) && is_array($booking_id) && !$paginate) {
      $data = static::with('approvedBookingDetails')->whereIn('booking_id',$booking_id)->get();
    }

    if(is_null($id) && !is_array($booking_id) && !empty($booking_id) && !$paginate) {
      $order_no = explode(", ", $booking_id);

      $data = static::with('approvedBookingDetails')->whereIn('booking_id',$order_no)->get();
    }

    if(!is_null($id) && empty($booking_id) && !$paginate) {
      $data = static::with('approvedBookingDetails')->where('id',$id)->get();
    }

    self::putShipemtQantity($data);
    return $data;
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
  public static function getDraftById($id)
  {
    return static::userId()->draftBooking()->with('bookingDetails')->where('id',$id)->first();
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

  /**
   * Put Shipment Qty
   */
  public static function putShipemtQantity($datas = null){
    if(count($datas) > 0) {
      foreach ($datas as &$data) {
        if( isset($data->approvedBookingDetails) && count($data->approvedBookingDetails) > 0) {
          foreach ($data->approvedBookingDetails as &$value) {
            $quantity = Shipment::getSumQtyByBookingDetailsId($value->id);
            $value->shipemnt_qty = $quantity ? $quantity : 0;
            $value->quantity = (int) $value->quantity - $quantity;
          }

        }else{
          if(isset($data->quantity)){
            $quantity = Shipment::getSumQtyByBookingDetailsId($data->id);
            $data->shipemnt_qty = $quantity ? $quantity : 0;
            $data->quantity = (int) $data->quantity - $quantity;
          }
        }
      }
    }

   
  }
  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
      'is_draft' => 'boolean'
  ];
}
