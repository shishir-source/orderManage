<?php

namespace Modules\Booking\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\User\Entities\User;
use Modules\Booking\Entities\Payment;
use Modules\Booking\Entities\Booking;
use Modules\Booking\Entities\BookingDetails;
use Modules\Core\Http\Controllers\Controller;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class PaymentController extends Controller
{
	public function payment(Request $request,$id){

		if($request->get('action') == "payment") {

			$bookingDetails_id = (array) json_decode($request->get('bookingDetails_id'));

			$total_price = isset($request->total_price)? $request->total_price : 0;
			$availabe_balance = isset($request->availabe_balance)? $request->availabe_balance : 0;

			if($availabe_balance >= $total_price && count($bookingDetails_id) > 0) {
				$payment = new Payment();
				$payment->booking_id = $id;
				$payment->payment_amount = $total_price;
				$payment->available_amount = $availabe_balance;
				$payment->save();

				if($payment) {
					$user = User::find(auth_user()->id);
					$user->blance = $payment->available_amount - $payment->payment_amount;
					$user->update();

					foreach ($bookingDetails_id as $key => $id) {
						$booking_details = BookingDetails::find($id);
						$booking_details->is_payment = 1;
						$booking_details->update();
					}
				}
			}else{
				return redirect()->back()->withError("Insufficient Balance or Total Price.");
			}
			return redirect()->back()->withSuccess("Payment Success.");
		}

		return redirect()->back()->withError("Payment Failed.");
	}
}