<?php

namespace Modules\Booking\Entities;

use Modules\Booking\Entities\BookingDetails;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Shipment\Entities\Shipment;
use Modules\Core\Eloquent\Model;
use Carbon\Carbon;
use DB;

class Payment extends Model
{
  use SoftDeletes;

	/**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
	    'payment_amount', 'booking_id', 'available_amount', 'status',
	];

	public static function getPaymentAmountByBookingId($booking_id) {
		
		$data = static::where('booking_id',$booking_id)->select(DB::Raw("SUM(payment_amount) as payment_amount"))->groupBy("booking_id")->first();

		return isset($data->payment_amount) ? $data->payment_amount : 0;
	}
}
