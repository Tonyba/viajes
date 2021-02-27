<?php

namespace App\Http\Controllers;

use App\Models\Deposito;
use Illuminate\Http\Request;

class DepositoController extends Controller {

    public function index() {
        $depositos = Deposito::all();

        return view('deposito.index', [
            'depositos' => $depositos,
        ]);
    }

    public function create() {
        return view('deposito.create');
    }

    public function save(Request $request) {
        $validate = $request->validate([
            'fecha' => 'required|date',
            'cantidad' => 'required|numeric',
        ]);

        $deposito = new Deposito();
        $deposito->fecha = $request->input('fecha');
        $deposito->cantidad = $request->input('cantidad');

        $deposito->save();

        return redirect()->route('deposito.index')->with([
            'mensaje' => 'El deposito se ha añadido correctamente',
        ]);
    }

}