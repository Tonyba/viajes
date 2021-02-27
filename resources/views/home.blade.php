@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <h2>Viajes</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Destino</th>
                        <th scope="col">Tipo</th>
                        <th scope="col"></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($viajes as $viaje)
                    <tr>
                        <th scope="row">
                            <span class="viaje-tipo">
                                @if( $viaje->tipo == 'Redondo' )
                                R
                                @else
                                S
                                @endif
                            </span>
                        </th>

                        <td class="align-middle">
                            {{$viaje->fecha}} <br>
                            #Guia: {{$viaje->numero_guia}}
                        </td>
                        <td class="align-middle">{{$viaje->destino}}</td>
                        <td class="align-middle">{{$viaje->tipo}}</td>
                        <td class="align-middle">
                            <a href="{{route('viaje.detail', ['id' => $viaje->id])}}">
                                <i class="fa fa-plus-circle plus-icon" aria-hidden="true"></i>
                            </a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection