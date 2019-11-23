<?php

namespace Modules\Booking\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Booking\Entities\Booking;
use Modules\Booking\Entities\BookingDetails;
use Modules\Core\Http\Controllers\Controller;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class DraftController extends Controller
{
	/**
     * Display a listing of the resource.
     * @return Response
     */
	public function index(){
		return view('booking::draft.index',[
            'bookings' => Booking::draftList(),
        ]);
	}

	/**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
	public function edit($id) {
		return view('booking::draft.edit',[
            'booking' => Booking::getDraftById($id),
        ]);
	}

	/**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
	public function update(Request $request, $id) {

		$booking = Booking::find($id);
		$booking->is_draft = ($request->get('action') == "save") ? 1 : 0;
		$booking->date = $request->get('date');
		$booking->payment = $request->get('payment');
		$booking->payment_reference = $request->get('payment_reference');
		$booking->update();

		$bookingOrders = array();
		$bookingDetails = $request->except('_token','date','payment','payment_reference');
		if(count($bookingDetails) > 0) {
		    foreach ($bookingDetails as $fieldName => $orders) {
		        if(is_array($orders)) {
		            foreach ($orders as $key => $order) {
		            	if(!empty($order)) {
		            		$bookingOrders[$key]['is_draft'] = ($request->get('action') == "save") ? 1: 0;
		                	$bookingOrders[$key]['booking_id'] = $id;
		                	$bookingOrders[$key][$fieldName] = $order;
		                }
		            }
		        }
		    }
		}

		if( count($bookingOrders) > 0) {
		    foreach ($bookingOrders as $key => $bookingOrder) {
		        $booking_details = BookingDetails::find($bookingOrder['id']);
		        if(count($booking_details) > 0) {
		        	$booking_details->fill($bookingOrder);
		        	$booking_details->update();
		        }else{
		        	$booking_details = New BookingDetails();
		        	$booking_details->fill($bookingOrder);
		        	$booking_details->save();
		        }		        
		    }
		}
		
		if($booking->is_draft) {
		    return redirect()->route('booking.draft.index')->withSuccess('New Booking Successfully created.');
		}

		return redirect()->route('booking.index')->withSuccess('New Booking Successfully created.');
	}

	/**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
	public function destroy() {
		$booking = Booking::with('bookingDetails')->findOrFail($id);

		if(count($booking->bookingDetails) > 0){
		    foreach ($booking->bookingDetails as $key => $bookingDetail) {
		        $bookingDetail->delete();
		    }
		}
		$booking->delete();

		return redirect()->route('booking.draft.index',$id)->withSuccess("Successfully Delete orders");
	}
}
