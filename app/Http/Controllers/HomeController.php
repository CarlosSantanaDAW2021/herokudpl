<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;


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
        $producto = DB::table('productos')->get();
        return view('index',['productos'=> DB::table('productos')->paginate(10)],["productos" => $producto]);
    }
    public function indexNoLogged()
    {
        $producto = DB::table('productos')->get();
        return view('index-no-logged',['productos'=> DB::table('productos')->paginate(10)],["productos" => $producto]);
    }
}
