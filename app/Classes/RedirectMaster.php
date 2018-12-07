<?php
namespace App\Classes;
use Session;
use URL;
trait RedirectMaster
{
	public function setUrl()
	{
		Session::put('routejt', URL::full());
	}
	public function getUrl($route)
	{
		return Session::has('routejt') ? Session::get('routejt') : $route;
	}
}