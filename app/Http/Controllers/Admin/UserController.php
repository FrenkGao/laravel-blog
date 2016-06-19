<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function modifyPassword()
    {
        $user = Auth::user();

        return view('admin.user.modify', $user);
    }

    public function updatePassword(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        $credentials = $request->only(
            'name', 'password', 'password_confirmation'
        );
        $user = Auth::user();
        $user->password = bcrypt($credentials['password']);
        $user->name = $credentials['name'];
        $user->save();
        Auth::logout($user);

        return redirect('auth/login')->withSuccess('信息修改成功，请重新登录！');
    }
}
