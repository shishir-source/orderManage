<?php

namespace Modules\Booking\Http\Controllers;

use File;
use Maatwebsite\Excel\Excel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Booking\Entities\Payment;
use Modules\Booking\Entities\Booking;
use Modules\Booking\Entities\BookingDetails;
use Modules\Core\Http\Controllers\Controller;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Modules\Booking\Http\Imports\BookingImport;

class ExcelController extends Controller
{
	protected $excel;

	protected $error;

	protected $collection;

	protected $header;

	protected $extension = ['xlsx','xls'];
	
	public function __construct(Excel $excel) {
		$this->excel = $excel;
	}

	public function import(Request $request) {
		$this->validate($request, array(
      'upload_excel' => 'required'
    ));

		$this->collection = [];

    if($request->hasFile('upload_excel')){
    	$extension = File::extension($request->file('upload_excel')->getClientOriginalName());
      if (in_array($extension, $this->extension)) {
				$array = $this->excel->toArray(new BookingImport(), $request->file('upload_excel'));

				if(is_array($array) && count($array) > 0) {
					foreach ($array as $values) {
						$this->header = $values[0];
						unset($values[0]);
						foreach ($values as $keys => $value) {
							if(!empty($value)) {
								foreach ($value as $key => $val) {
									$this->collection[$keys][$this->header[$key]] = $val;
								}
							}
						}
					}
				}
      }else{
      	$this->error = "Unknown Extention";
      }
    }else{
    	$this->error = "File not exit";
    }

    if($this->error) {
    	return redirect()->back()->withError($this->error);
    }

    return redirect()->route('booking.create')->with("excel_data",$this->collection)->withSuccess('Excel data upload successfully. Please save or submit unless the data is remove.');
	}

	/**
	 * @return array;
	 */
	public function getCollection() {
		return $this->collection;
	}
	/**
	 * @return array;
	 */
	public function getHeader() {
		return $this->header;
	}
	/**
	 * @return string;
	 */
	public function getError() {
		return $this->error;
	}
}