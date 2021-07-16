@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                        <br><br>
                        <a href="qrredirect" class="btn btn-primary">Configuracion de enlaces</a>

                        @if(Auth::user()->isAdmin())
                            <br><br>
                            <a href="changetables" class="btn btn-primary">Cambiar Mesas</a>
                        @endif

                        <br><br>
                    <a href="qrcode" class="btn btn-primary">Generate Qr</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
