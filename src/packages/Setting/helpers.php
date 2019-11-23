<?php
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

if(!function_exists('auth_user')){
	function auth_user(){
		return Sentinel::check();
	}
}