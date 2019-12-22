<?php

namespace Modules\Booking\Http\Imports;

use Modules\Booking\Entities\BookingDetails;
use Maatwebsite\Excel\Concerns\FromCollection;

class BookingImport implements FromCollection
{
	public function collection() {   
    return BookingDetails::all();
  }
}
