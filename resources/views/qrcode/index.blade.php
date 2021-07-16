@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if (session('error'))
                        <div class="alert alert-success" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form method="POST" action="generate">
                        @csrf
                        <label class="col-form-label">Generador de QR's</label>
                        <div>
                            <h1> <span class="badge badge-secondary">QR BaseUrl: </span>{{Auth::user()->baseurl}}</h1>
                        <input type="hidden" class="form-control" name="mybaseurl" placeholder="{{Auth::user()->baseurl}}" value="{{Auth::user()->baseurl}}">
                       &nbsp;</div>

                            <div>
                                <h1> <span class="badge badge-secondary">QR start Number:</span> {{Auth::user()->startNumber}}</h1>
                                <input type="hidden" class="form-control" name="startrange" placeholder="{{Auth::user()->startNumber}}" disabled="true">
                            </div>
                            <div >

                                <input type="text" class="form-control" name="endrange" placeholder="Numero de QR's" max="100">
                            </div>

                        <div>&nbsp;</div>
                        <button type="submit" class="btn btn-primary">Generate</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
