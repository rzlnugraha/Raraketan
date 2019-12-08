<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function changeProfile()
    {
        return view('change_password');
    }

    public function saveProfile(Request $request)
    {
        try {
            $user = User::find(Auth::user()->id);
            $user->name = $request->name;
            $user->username = $request->username;
            $user->password = bcrypt($request->password);
            $user->save();

            session()->flash('alert_message', 'Data Berhasil DiSimpan');
            session()->flash('alert_notif', 'success');
        } catch (\Throwable $th) {
            session()->flash('alert_message', $th->getMessage());
            session()->flash('alert_notif', 'danger');
            
        }   

        return back();
    }
}
