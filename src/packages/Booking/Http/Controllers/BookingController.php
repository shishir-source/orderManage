<?php

namespace Modules\Booking\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Booking\Entities\Booking;
use Modules\Booking\Entities\BookingDetails;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('booking::index',[
            'bookings' => Booking::with('bookingDetails')->paginate(),
        ]);
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function adminBooingList()
    {
        return view('booking::admin_booking_list',[
            'bookings' => Booking::getAdminBooking(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('booking::create');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function latest()
    {
        return response()->json(Booking::getLatest());
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $booking['booking_id'] = Booking::generateOrderNumber();
        $booking['user_id'] = Sentinel::check()->id;        
        $booking = new Booking();
        $booking->booking_id = Booking::generateOrderNumber();
        $booking->user_id = Sentinel::check()->id;
        $booking->status = "booked";
        $booking->save();
        $booking_id = $booking->id;

        $bookingOrders = [];
        $bookingDetails = $request->except('_token','order_date');
        if(count($bookingDetails) > 0) {
            foreach ($bookingDetails as $fieldName => $orders) {
                foreach ($orders as $key => $order) {
                    $bookingOrders[$key]['booking_id'] = $booking_id;
                    $bookingOrders[$key][$fieldName] = $order;
                }
            }
        }

        if( count($bookingOrders) > 0) {
            foreach ($bookingOrders as $key => $bookingOrder) {
                $booking_details = new BookingDetails();
                $booking_details->fill($bookingOrder);
                $booking_details->save();
            }
        }
        
        return redirect()->route('booking.index')->withSuccess('New Booking Successfully created.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id =null)
    {
        return view('booking::show',[
            'booking' => Booking::getById($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id = null)
    {
        return view('booking::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function showUpdate(Request $request, $id)
    {
        $aproved = BookingDetails::adminApproved($request->get('is_admin_aproved'));
        if($aproved){
            Booking::findOrFail($id)->update(['status' => "process"]);
            return redirect()->route('booking.view',$id)->withSuccess("Successfully Approved orders");
        }
        return redirect()->route('booking.view',$id)->withError("Failed Approved orders");
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $booking = Booking::with('bookingDetails')->findOrFail($id);

        if(count($booking->bookingDetails) > 0){
            foreach ($booking->bookingDetails as $key => $bookingDetail) {
                $bookingDetail->delete();
            }
        }
        $booking->delete();

        return redirect()->route('booking.index',$id)->withSuccess("Successfully Delete orders");
    }
}
