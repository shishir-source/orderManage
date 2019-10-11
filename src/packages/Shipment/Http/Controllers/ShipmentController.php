<?php

namespace Modules\Shipment\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\User\Entities\User;
use Illuminate\Routing\Controller;
use Modules\Booking\Entities\Booking;
use Modules\Shipment\Entities\Shipment;
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
        // print_r("<pre>");
        // print_r(Shipment::with('bookingDetails')->paginate());die();
        return view('shipment::index',[
            'shipments' => Shipment::with('bookingDetails')->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create($id = null)
    {
        if (is_null($id)) {
           return view('shipment::create',['booking' => '']);
        }
        return view('shipment::create',[
            'booking' => Booking::getAdminBooking($id, false),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $shipments = [];
        $booking_details_id = $request->get('booking_details_id');
        if(count($booking_details_id) > 0) {
            foreach ($booking_details_id as $key => $value) {
                $shipments[$key]['booking_details_id'] = $value;
                $shipments[$key]['user_id'] = Sentinel::check()->id;
                $shipments[$key]['status'] = $request->get('status');
                $shipments[$key]['booking_number'] = $request->get('booking_number');
            }
        }

        if( count($shipments) > 0) {
            foreach ($shipments as $key => $shipment) {
                $booking_details = BookingDetails::findOrFail($shipment['booking_details_id'])->where('is_shipment', false)->update(['is_shipment' => true]);
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
    public function show($id)
    {
        return view('shipment::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('shipment::edit');
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
            foreach ($shipment->bookingDetails as $key => $bookingDetail) {
                $bookingDetail->is_shipment = false;
                $bookingDetail->update();
            }
        }
        $shipment->delete();

        return redirect()->route('shipment.index',$id)->withSuccess("Successfully Delete orders");
    }
}
