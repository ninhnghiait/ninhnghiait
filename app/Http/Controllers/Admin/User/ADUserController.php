<?php

namespace App\Http\Controllers\Admin\User;

use App\Classes\RedirectMaster;
use App\Classes\UploadFile;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\User;
use App\model\Group;
use Carbon\Carbon;
use Faker\Provider\PhoneNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ADUserController extends Controller
{
    use RedirectMaster;
    use UploadFile;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function index()
    {
        $this->setUrl();
        $items = $this->user->getItems(['groups', 'phoneNumber']);
        $groups = Group::all();
        return view('admin.user.index', compact('items', 'groups'));
    }

    public function create()
    { 
        $groups = Group::getAllItem()->toArray();
        return view('admin.user.create', compact('groups'));
    }

    public function store(UserRequest $request)
    {
        $arItem = [];
        $arItem['password'] = Hash::make($request->password);
        if($request->hasFile('avatarfr') && $request->file('avatarfr')->isValid()) $arItem['avatar'] = $this->uploadFile($request->avatarfr, 'users');
        if ($request->has('activefr')) {
            $arItem['email_verified_at'] = Carbon::now();
            $arItem['active'] = true;
        } else{
            $arItem['active'] = false;
        }
        try {
            DB::beginTransaction();
            $user = $this->user->create($arItem + $request->all());
            // groups
            if($request->has('groups')) $user->groups()->attach($request->groups);
            // phone number
            $phoneNumberObject = phone($request->phone_number, $request->region_code);
            $user->phoneNumber()->create([
                'country_code' => $phoneNumberObject->getPhoneNumberInstance()->getCountryCode(),
                'region_code' => $phoneNumberObject->getCountry(),
                'national_number' => $phoneNumberObject->getPhoneNumberInstance()->getNationalNumber(),
                'e164_format' => $phoneNumberObject->formatE164()
            ]);
            DB::commit();
            $msg = 'Success!';
        } catch (\Exception $e) {
            DB::rollback();
            $msg = 'Fail!';
        }
        $url = $this->getUrl(route('ad_users.index'));
        return redirect($url)->with('msg', $msg);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $groups = Group::getAllItem()->toArray();
        $user = $this->user->with('groups', 'phoneNumber')->findOrFail($id);
        return view('admin.user.edit', compact('groups', 'user'));
    }

    public function update(UserRequest $request, $id)
    {
        $user = $this->user->findOrFail($id);
        $arItem = [];
        $arItem['active'] = $request->has('activefr') ? true : false;
        if ($request->has('password')) $arItem['password'] = Hash::make($request->password);
        if (!is_null($request->file('avatarfr')) && $request->file('avatarfr')->isValid()){
           $arItem['avatar'] = $this->uploadFile($request->avatarfr, 'users');
           if (!is_null($user->avatar)) $this->delFile('users', $user->avatar);
        };
        if (!is_null($request->password)){
           $arItem['password'] = Hash::make($request->password);
        } else {
           $arItem['password'] = $user->password;
        };
        try {
            DB::beginTransaction();
            $user->update($arItem + $request->all());
            // groups
            if($request->has('groups')) $user->groups()->sync($request->groups);
            // phone number
            $phoneNumberObject = phone($request->phone_number, $request->region_code);
            $user->phoneNumber()->update([
                'country_code' => $phoneNumberObject->getPhoneNumberInstance()->getCountryCode(),
                'region_code' => $phoneNumberObject->getCountry(),
                'national_number' => $phoneNumberObject->getPhoneNumberInstance()->getNationalNumber(),
                'e164_format' => $phoneNumberObject->formatE164()
            ]);
            DB::commit();
            $msg = 'Success!';
        } catch (\Exception $e) {
            // dd($e->getMessage());
            DB::rollback();
            $msg = 'Fail!';
        }
        $url = $this->getUrl(route('ad_users.index'));
        return redirect($url)->with('msg', $msg);
    }

    public function destroy($id)
    {
        $user = $this->user->findOrFail($id);
        $avatar = $user->avatar;
        try {
            DB::beginTransaction();
            $user->groups()->detach();
            $user->phoneNumber()->delete();
            $msg = $user->delete() ? 'Success!' : 'Fail!';
            DB::commit();
            if (!is_null($avatar)) $this->delFile('users' , $user->avatar);
        } catch (\Exception $e) {
            // dd($e->getMessage());
            DB::rollback();
            $msg = 'Fail!';
        }
        $url = $this->getUrl(route('ad_users.index'));
        return redirect($url)->with('msg', $msg);
    }

    public function delMore(Request $request)
    {
        if ($request->has('dels')) {
            $count = 0;
            foreach ($request->dels as $key => $id) {
                try {
                    DB::beginTransaction();
                    $user = $this->user->findOrFail($id);
                    $user->groups()->detach();
                    $user->phoneNumber()->delete();
                    if (!is_null($user->avatar)) $this->delFile('users' , $user->avatar);
                    $user->delete();
                    DB::commit();
                    $count ++;
                } catch (\Exception $e) {
                    dd($e->getMessage());
                    DB::rollback();
                }
            }
            $msg = "Đã xóa $count user";
        } else {
            $msg = 'No choose record';
        };
        $url = $this->getUrl(route('ad_users.index'));
        return redirect($url)->with('msg', $msg);
    }

    public function active(Request $request)
    {
        $id = $request->id;
        $user = $this->user->findOrFail($id);
        if ($user->active) { $user->active = false;} else { $user->active = true; $user->email_verified_at = Carbon::now();}
        $user->save();
    }
    public function search(Request $request)
    {
        $q = $request->q;
        $group_id = $request->group_id;
        $items = $this->user->search($q, $group_id);
        $msg = 'Total '.$items->total().' result(s)';
        $request->session()->put('search', ['q' => $q, 'group_id' => $group_id]);
        $request->session()->flash('msg', $msg);
        $groups = Group::all();
        return view('admin.user.index', compact('items', 'groups'));
    }
}
