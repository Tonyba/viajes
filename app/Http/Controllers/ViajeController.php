<?php

namespace App\Http\Controllers;

use App\Models\Viaje;
use Illuminate\Http\Request;

class ViajeController extends Controller {
    //
    public function create() {
        return view('viaje.create');
    }

    public function save(Request $request) {
        $validate = $request->validate([
            'fecha' => 'required|date',
            'destino' => 'required|string',
            'tipo' => 'required|string',
            'numero_guia' => 'required|numeric',
        ]);

        $viaje = new Viaje();
        $viaje->fecha = $request->input('fecha');
        $viaje->destino = $request->input('destino');
        $viaje->tipo = $request->input('tipo');
        $viaje->numero_guia = $request->input('numero_guia');

        $viaje->save();

        return redirect()->route('home')->with([
            'mensaje' => 'El viaje se ha añadido correctamente',
        ]);

    }

    public function detail($id) {
        $viaje = Viaje::find($id);

        return view('viaje.detail', [
            'viaje' => $viaje,
        ]);
    }

    public function update(Request $request) {
        $validate = $request->validate([
            'fecha' => 'required|date',
            'destino' => 'required|string',
            'tipo' => 'required|string',
            'numero_guia' => 'required|numeric',
        ]);
        $viaje_id = $request->input('id');

        $viaje = Viaje::find($viaje_id);
        $viaje->fecha = $request->input('fecha');
        $viaje->destino = $request->input('destino');
        $viaje->tipo = $request->input('tipo');
        $viaje->numero_guia = $request->input('numero_guia');

        $viaje->update();

        return redirect()->route('viaje.detail', ['id' => $viaje_id])
            ->with(['message' => 'El viaje se ha actualizado correctamente']);

    }
}