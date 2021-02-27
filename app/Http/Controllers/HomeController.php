<?php

namespace App\Http\Controllers;

use App\Models\Viaje;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $viajes = Viaje::all();
        return view('home', [
            'viajes' => $viajes,
        ]);
    }
}