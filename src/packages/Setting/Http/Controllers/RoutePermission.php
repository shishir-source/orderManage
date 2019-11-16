<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Core\Http\Controllers\Controller;

class RoutePermission extends Controller
{
	protected $routes;

	public function __construct() {
		
		$this->routes = isset(app('config')['route_permision']) ? app('config')['route_permision'] : [];
	}

	protected function adminRoute() {
		return isset($this->routes['admin']) ? $this->routes['admin'] : []
	}

	protected function customerRoute() {
		return isset($this->routes['customer']) ? $this->routes['customer'] : []
	}

	protected function shipmentRoute() {
		return isset($this->routes['shipment']) ? $this->routes['shipment'] : []
	}

	protected function defaultRoute() {
		return isset($this->routes['default']) ? $this->routes['default'] : []
	}
}