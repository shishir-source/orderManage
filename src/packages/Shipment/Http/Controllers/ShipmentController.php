<?php

namespace Modules\Shipment\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\User\Entities\User;
use Modules\Booking\Entities\Booking;
use Modules\Shipment\Entities\Shipment;
use Modules\Core\Http\Controllers\Controller;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Modules\Booking\Entities\BookingDetails;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {   
        return view('shipment::index',[
            'shipments' => Shipment::list(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create($id = null)
    {

        if (is_null($id)) {
           return view('shipment::create',[
                'bookings' => [],
                // 'booking_numbers' => Booking::getBookingNumbers()
                'booking_numbers' => BookingDetails::getOrderNo()
            ]);
        }

        return view('shipment::create', [
            'bookings' => Booking::getAdminBooking($id,null,false),
            'booking_numbers' => BookingDetails::getOrderNo(),
            // 'booking_numbers' => Booking::getBookingNumbers()
        ]);
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
            'status' => 'required',
            'quantity.*' => 'required',
        ]);

        $order_no = $request->get('order_no');
        $order_no = implode(", ", (array) $order_no);

        if(!isset($request->is_shipment)) {
            return redirect()->route('shipment.show',$order_no)->withError('Please select an item.');
        }
        
        $shipments = [];
        $is_shipment = $request->get('is_shipment');
        if(count($is_shipment) > 0) {
            foreach ((array) $is_shipment as $key => $value) {
                $shipments[$key]['booking_details_id'] = $value;
                $shipments[$key]['shipment_no'] = Shipment::generateShipmentNo();
                $shipments[$key]['user_id'] = Sentinel::check()->id;
                $shipments[$key]['status'] = $request->get('status');
                $shipments[$key]['quantity'] = isset($request->quantity[$key]) ? $request->quantity[$key] : 0;
                $shipments[$key]['order_no'] = isset($request->order_no[$key]) ? $request->order_no[$key] : 0;
                $shipments[$key]['booking_number'] = isset($request->booking_number[$key]) 
                                                    || empty($request->booking_number[$key]) 
                                                    || !empty($request->booking_number[$key]) ? 
                                $request->booking_number[$key] : $request->get('booking_number');
            }
        }
        
        if( count($shipments) > 0) {
            foreach ($shipments as $key => $shipment) {
                $booking_details = BookingDetails::where('id',$shipment['booking_details_id'])->update(['is_shipment' => true]);
                if ($booking_details) {
                    $shipment_ = new Shipment();
                    $shipment_->fill($shipment);
                    $shipment_->save();
                }
            }
        }

        return redirect()->route('shipment.index')->withSuccess('New Shipment Successfully created.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(Request $request, $id = null)
    {
        $booking_numbers = $request->get('booking_numbers') ? $request->get('booking_numbers') : $id;

        return view('shipment::show',[
            'bookings' => BookingDetails::getBookingForShipment($booking_numbers),
            'booking_numbers' => BookingDetails::getOrderNo(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('shipment::edit',[
            'shipments' => Shipment::getByShipmentNo($id),
        ]);
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
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $shipment = Shipment::with('bookingDetails')->findOrFail($id);

        if(count($shipment->bookingDetails) > 0){
            $shipment->bookingDetails->is_shipment = false;
            $shipment->update();
        }
        $shipment->delete();

        return redirect()->route('shipment.index',$id)->withSuccess("Successfully Delete orders");
    }
}
