<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.index');
    }

    public function registerUser()
    {

        $data = [
            'users' => User::where('id', '!=', 1)->get(),
        ];

        return view('admin.register-user', $data);
    }

    public function registerUserEdit($id)
    {
        $data = [
            'user' => User::select('id', 'name', 'email', 'phone', 'cv_link', 'status')->where('id', $id)->first()
        ];
        return view('admin.register-user-edit', $data);
    }

    public function registerUserUpdate(Request $request, $id)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'cv_link' => ['required', 'string', 'max:255'],
        ]);

        $status = $request->status ? 1 : 0;

        $user = User::where('id', $id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'cv_link' => $request->cv_link,
                'status' => $status,
            ]);

        Session::flash('message', 'Updated');

        return redirect()->route('admin.register.user');
    }
}
