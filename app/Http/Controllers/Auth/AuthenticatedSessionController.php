<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $isAdmin = $this->isAdmin($request);

        if ($isAdmin) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }

    private function isAdmin($data)
    {
        $admin = User::where('email', $data->email)->get()->toArray();

        foreach ($admin as $key => $value) {
            if ($value['type'] == 'admin') {
                $isAdmin = true;
                break;
            }
            $isAdmin = false;
        }
        if ($isAdmin) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
