<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use Illuminate\Http\Request;

class GastoController extends Controller {
    //
    public function save(Request $request) {
        $validate = $request->validate([
            'cantidad' => 'required|numeric',
            'tipo' => 'required|string',
        ]);

        $gasto = new Gasto();
        $gasto->viaje_id = $request->input('viaje_id');
        $gasto->cantidad = $request->input('cantidad');
        $gasto->tipo = $request->input('tipo');

        $gasto->save();

        return redirect()->route('viaje.detail', ['id' => $gasto->viaje_id])->with([
            'mensaje' => 'El gasto se ha agregado correctamente',
        ]);
    }
}