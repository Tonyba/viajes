@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <h2>Viaje</h2>
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
                    </tr>
                </thead>
                <tbody>

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
                    </tr>

                </tbody>
            </table>

            <h2 class="pt-3">Gastos del Viaje</h2>
            @if(count($viaje->gastos))
            <ul class="list-group list-group-horizontal mt-2">
                @foreach($viaje->gastos as $gasto)
                <li class="list-group-item"><strong>{{ $gasto->tipo }}</strong> {{ $gasto->cantidad }}mil Bs.F </li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <h2>Agregar Gasto</h2>
        </div>
    </div>
    <div class="row justify-content-center mt-2">

        <div class="col-md-8 mt-2">
            <form action="{{route('gasto.save')}}" method="POST">
                @csrf
                <input type="hidden" name="viaje_id" value="{{$viaje->id}}">
                <div class="form-group row">
                    <label class="col-md-2 col-form-label text-md-right" for="cantidad">Cantidad</label>
                    <div class="col-md-10">
                        <input type="number" class="form-control {{ $errors->has('cantidad') ? 'is-invalid' : ''  }} "
                            id="cantidad" name="cantidad" />
                        @if($errors->has('cantidad'))
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $errors->first('cantidad')  }} </strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label text-md-right" for="tipo">Tipo</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control {{ $errors->has('tipo') ? 'is-invalid' : ''  }} "
                            id="tipo" name="tipo" />
                        @if($errors->has('tipo'))
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $errors->first('tipo')  }} </strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-6">
                        <button type="submit" class="btn btn-lg btn-primary">Agregar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>
@endsection