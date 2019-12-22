<?php

namespace Modules\Setting\Http\Controllers;

use Maatwebsite\Excel\Excel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Core\Http\Controllers\Controller;

class ExcelController extends Controller
{	
	public $excel;
	
	public function __construct(Excel $excel) {
		$this->excel = $excel;
	}
}