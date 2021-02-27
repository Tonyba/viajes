@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <h2 class="titulo">Añadir Viaje</h2>

        <div class="col-md-12 mt-5">
            <form action="{{route('viaje.save')}}" method="POST">
                @csrf
                <div class="form-group row">
                    <label class="col-md-2 col-form-label text-md-right" for="fecha">Fecha</label>
                    <div class="col-md-10">
                        <input type="date" class="form-control {{ $errors->has('fecha') ? 'is-invalid' : ''  }} "
                            id="fecha" name="fecha" />
                        @if($errors->has('fecha'))
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $errors->first('fecha')  }} </strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label text-md-right" for="destino">Destino</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control {{ $errors->has('destino') ? 'is-invalid' : ''  }} "
                            id="destino" name="destino" />
                        @if($errors->has('destino'))
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $errors->first('destino')  }} </strong>
                        </span>
                        @endif
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-md-2 col-form-label text-md-right" for="tipo">Tipo</label>
                    <div class="col-md-10">
                        <select name="tipo" class="form-control">
                            <option value="Redondo">Redondo</option>
                            <option value="Simple">Simple</option>
                        </select>
                        @if($errors->has('tipo'))
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $errors->first('tipo')  }} </strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label text-md-right" for="numero_guia"># Guia</label>
                    <div class="col-md-10">
                        <input type="number"
                            class="form-control {{ $errors->has('numero_guia') ? 'is-invalid' : ''  }} "
                            id="numero_guia" name="numero_guia" />
                        @if($errors->has('numero_guia'))
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $errors->first('numero_guia')  }} </strong>
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