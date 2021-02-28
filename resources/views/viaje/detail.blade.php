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
                        <th scope="col"></th>
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
                        <input class="viaje-id" type="hidden" name="id" value="{{$viaje->id}}">
                        <td class="align-middle">
                            <div class="input-group">

                                <input name="fecha" readonly class="form-control campo viaje-fecha" type="date"
                                    value="{{$viaje->fecha}}">
                            </div>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text campo"># Guia &nbsp;</span>
                                </div>
                                <input name="numero_guia" readonly class="form-control campo viaje-numero_guia"
                                    type="number" value="{{$viaje->numero_guia}}">
                            </div>

                        </td>
                        <td class="align-middle">

                            <input name="destino" readonly class="form-control campo viaje-destino" type="text"
                                value="{{$viaje->destino}}">

                        </td>
                        <td class="align-middle">
                            <span class="viaje-tipo-placeholder">{{$viaje->tipo}}</span>
                            <select name="tipo" class="form-control oculto viaje-tipo-campo">
                                <option value="Simple" <?=$viaje->tipo == 'Simple' ? 'selected' : ''?>>Simple</option>
                                <option value="Redondo" <?=$viaje->tipo == 'Redondo' ? 'selected' : ''?>>Redondo
                                </option>
                            </select>

                        </td>
                        <td class="align-middle ">
                            <div class="btn-group acciones-editar-borrar">

                                <button type="button" class="btn btn-primary editar-viaje">
                                    <i class="fa fa-pencil">&nbsp;Editar</i>
                                </button>
                                <button type="button" class="btn btn-danger borrar-viaje">
                                    <i class="fa fa-trash-o">&nbsp;Borrar</i>
                                </button>
                            </div>

                            <div class="btn-group acciones oculto" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-success actualizar-viaje">
                                    <i class="fa fa-pencil">&nbsp;Actualizar</i>

                                </button>
                                <button type="button" class="btn btn-danger actualizar-viaje cancelar"> <i
                                        class="fa fa-times">&nbsp;Cancelar</i>
                                </button>
                            </div>
                        </td>

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