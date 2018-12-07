<?php

namespace App\Http\Controllers\Admin\Entrust;

use App\Classes\RedirectMaster;
use App\Http\Controllers\Controller;
use App\Model\Role;
use Illuminate\Http\Request;

class ADRoleController extends Controller
{
	use RedirectMaster;
	public function __construct(Role $role)
	{
		$this->role = $role;
	}

    public function index()
    {
    	$this->setUrl();
    	$items = $this->role->all();
    	return view('admin.role.index', compact('items'));
    }

    public function create()
    {
    	return view('admin.role.create');
    }

    public function store(Request $request)
    {
    	$msg = $this->role->create($request->all()) ? 'Success!' : 'Fail';
    	$url = $this->getUrl(route('ad_roles.index'));
        return redirect($url)->with('msg', $msg); 
    }
}
