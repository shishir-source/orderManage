<?php

namespace Modules\Booking\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Booking\Entities\Booking;
use Modules\Booking\Entities\BookingDetails;
use Modules\Core\Http\Controllers\Controller;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        // print_r("<pre>");
        // print_r(Booking::list());die();
        return view('booking::index', [
            'bookings' => Booking::list(),
        ]);
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function adminBooingList()
    {
        return view('booking::admin.index',[
            'bookings' => Booking::getAdminBooking(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Request $request)
    {   
        $excel_data = [];
        if(session()->has('excel_data')) {
            $excel_data = session()->get('excel_data') ?? [];
        }
    
        return view('booking::create', [
            'excel_data' => $excel_data,
        ]);
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
        // print_r("<pre>");
        // print_r($request->all());die();

        $this->validate($request,[
            'customer_name' => 'required',
            'date' => 'required',
            'payment' => 'required',
            'bsd_bill' => 'required',
            'payment_reference' => 'required',
            'weight_charge' => 'required',
            'organic_cost' => 'required',
            'orgnaic_shipping_cost' => 'required',
            'order_reference' => 'required',
            'conv_rate' => 'required',
            'due' => 'required',
            'currency_profit' => 'required',
            'shipping_profit' => 'required',
            'total_profit' => 'required',
            'remarks' => 'required',

            'name.*' => 'required',
            'link.*' => 'required',
            'price.*' => 'required|integer',
            'offer.*' => 'required',
            'quantity.*' => 'required|integer',
            'note.*' => 'required',
            'status.*' => 'required',
        ]);

        $booking = new Booking();
        $booking->is_draft = ($request->get('action') == "save") ? 1 : 0;
        $booking->booking_id = Booking::generateOrderNumber();
        $booking->user_id = Sentinel::check()->id;
        $booking->customer_name = $request->get('customer_name');
        $booking->date = $request->get('date');
        $booking->payment = $request->get('payment');
        $booking->payment_reference = $request->get('payment_reference');
        $booking->bsd_bill = $request->get('bsd_bill');
        $booking->weight_charge = $request->get('weight_charge');
        $booking->organic_cost = $request->get('organic_cost');
        $booking->orgnaic_shipping_cost = $request->get('orgnaic_shipping_cost');
        $booking->order_reference = $request->get('order_reference');
        $booking->conv_rate = $request->get('conv_rate');
        $booking->due = $request->get('due');
        $booking->loss_or_profit = $request->get('loss_or_profit');
        $booking->currency_profit = $request->get('currency_profit');
        $booking->shipping_profit = $request->get('shipping_profit');
        $booking->total_profit = $request->get('total_profit');
        $booking->remarks = $request->get('remarks');
        $booking->status = "booked";
        $booking->save();
        $booking_id = $booking->id;

        $bookingOrders = [];
        $bookingDetails = $request->except('_token','order_date','customer_name','payment_reference','payment','date','bsd_bill','weight_charge','organic_cost','order_reference','orgnaic_shipping_cost','conv_rate','due','Loss_or_Profit','currency_profit','shipping_profit','total_profit','remarks','action');

        if(count($bookingDetails) > 0) {
            foreach ($bookingDetails as $fieldName => $orders) {
                if(is_array($orders)) {
                    foreach ($orders as $key => $order) {
                        $bookingOrders[$key]['is_draft'] = ($request->get('action') == "save") ? 1: 0;
                        $bookingOrders[$key]['booking_id'] = isset($booking_id) ? $booking_id : 0;
                        $bookingOrders[$key][$fieldName] = $order;
                    }
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
        
        if($booking->is_draft) {
            return redirect()->route('booking.draft.index')->withSuccess('New Booking Successfully created.');
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
        // print_r("<pre>");
        // print_r(Booking::getById($id));die();
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
        $this->validate($request,[
            'customer_name' => 'required',
            'date' => 'required',
            'payment' => 'required',
            'bsd_bill' => 'required',
            'payment_reference' => 'required',
            'weight_charge' => 'required',
            'organic_cost' => 'required',
            'orgnaic_shipping_cost' => 'required',
            'order_reference' => 'required',
            'conv_rate' => 'required',
            'due' => 'required',
            'currency_profit' => 'required',
            'shipping_profit' => 'required',
            'total_profit' => 'required',
            'remarks' => 'required',
            
            'order_no.*' => 'required',
        ]);

        if(!isset($request->is_admin_aproved) ){
            return redirect()->route('booking.view',$id)->withError("Please Select an item.");
        } 
        
        $aproved = BookingDetails::adminApproved($request->get('is_admin_aproved'), $request->get('order_no'));

        if($aproved){
            $data = $request->except('_token','is_admin_aproved','order_no');
            $data['status'] = "process";

            Booking::findOrFail($id)->update($data);
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
