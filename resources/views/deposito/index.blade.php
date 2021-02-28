@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <h2>Depositos</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>

                        <th scope="col">Fecha</th>
                        <th scope="col">Cantidad</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($depositos as $deposito)
                    <tr>
                        <td class="align-middle">
                            <input name="fecha" readonly class="form-control campo deposito-cantidad" type="date"
                                value="{{$deposito->fecha}}">

                        </td>
                        <td class="align-middle">
                            <input name="cantidad" readonly class="form-control campo deposito-cantidad" type="number"
                                value="{{$deposito->cantidad}}">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection