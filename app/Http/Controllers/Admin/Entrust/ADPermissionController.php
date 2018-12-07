<?php

namespace App\Http\Controllers\Admin\Entrust;

use App\Classes\RedirectMaster;
use App\Http\Controllers\Controller;
use App\Model\Permission;
use Illuminate\Http\Request;

class ADPermissionController extends Controller
{
    use RedirectMaster;
	public function __construct(Permission $permission)
	{
		$this->permission = $permission;
	}

    public function index()
    {
    	$this->setUrl();
    	$items = $this->permission->all();
    	return view('admin.permission.index', compact('items'));
    }

    public function create()
    {
    	return view('admin.permission.create');
    }

    public function store(Request $request)
    {
    	$msg = $this->permission->create($request->all()) ? 'Success!' : 'Fail';
    	$url = $this->getUrl(route('ad_permissions.index'));
        return redirect($url)->with('msg', $msg); 
    }
}
