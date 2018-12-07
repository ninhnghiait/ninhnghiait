<?php
/**
 * 
 */
namespace App\Classes;

use App\User;
use Illuminate\Support\Facades\Auth;

class JurisUser 
{
	
	function __construct($id)
	{
		$this->id = $id;
	}
	public $id;
	public function getGroupUser()
	{
		return User::find($this->id)->groups->pluck('code')->toArray();
	}
	public function checkAdmin()
	{
		if (in_array('admin', $this->getGroupUser())) return true;
		return false;
	}
}