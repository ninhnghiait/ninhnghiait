<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function attributes()
    {
        return [
            'name' => 'Tên truy cập',
            'email' => 'Email',
            'fullname' => 'Tên đầy đủ',
            'password' => 'Mật khẩu',
            'address' => 'Địa chỉ',
            'phone_number' => 'Số điện thoại',
            'groups' => 'Group',
            'avatarfr' => 'Hình đại diện',
        ];
    }

    public function rules(Route $route, Request $request)
    {
        $id = $request->segment(4);
        $phoneValid = '|phone:'.strtoupper($request->region_code);
        $required = strpos($route->getName(), "store") ? "|required" : "";
        $minPassword = !is_null($request->get('password')) ? '|min:6' : ''; 
        $uniqueName = strpos($route->getName(), "store") ? "|unique:users" : "|unique:users,name,".$id;
        $uniqueEmail = strpos($route->getName(), "store") ? "|unique:users" : "|unique:users,email,".$id;
        $imageAvatar = $request->has('avatarfr') ? 'image|max:1000|dimensions:min_width=250,min_height=250,max_width=750,max_height=750' : '';
        return [
            'name' => 'required|string|min:6|max:100'.$uniqueName,
            'email' => 'required|email|min:6|max:100'.$uniqueEmail,
            'fullname' => 'required|string|min:6|max:100',
            'password' => 'max:100'.$minPassword.$required,
            'address' => 'min:6|max:200',
            'phone_number' => 'required|'.$phoneValid,
            'groups' => 'required',
            'avatarfr' => $imageAvatar.$required
        ];
    }
    
}
