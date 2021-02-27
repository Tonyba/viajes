@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <h2 class="titulo">Añadir Deposito</h2>

        <div class="col-md-12 mt-5">
            <form action="{{route('deposito.save')}}" method="POST">
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
                    <div class="col-md-6 offset-md-6">
                        <button type="submit" class="btn btn-lg btn-primary">Agregar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection