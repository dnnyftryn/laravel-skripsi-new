<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userHome()
    {
        $id     = auth()->user()->id;
        $user   = User::findOrFail($id);
        $count  = \DB::table('keranjang')
                    ->where('user_id', $id)
                    ->where('status', 'keranjang_user')
                    ->count();
     
        return view('user.beranda.index', compact('count', 'user'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $users = User::latest()->paginate(9);
        return view('admin.dashboard', compact('users'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome()
    {
        return view('manager.managerHome');
    }

    public function warehouseHome()
    {
        return view('warehouse.index');
    }
}
