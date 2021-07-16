@extends('layouts.app')

@section('content')
    <div class="card">


        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Nueva mesa</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('qrredirect.index') }}" title="Go back"> <i
                                    class="fas fa-backward "></i> </a>
                    </div>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{  route('qrredirect.update', $qrredirect->id)}}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="">
                        <div class="form-group m-2">
                            <strong>Numero de QR</strong>
                            <input type="text" name="soureURL" class="form-control" placeholder="{{$qrredirect->soureURL}}" value="{{$qrredirect->soureURL}}" readonly>
                        </div>
                    </div>
                    <div class="">
                        <div class="form-group m-2">
                            <strong>Numero de Mesa Nueva</strong>





                            <input type="text" class="form-control"  name="destinyURL" placeholder="{{substr($qrredirect->destinyURL,strlen(auth()->user()->baseurl)+12)}}" value="{{substr($qrredirect->destinyURL,strlen(auth()->user()->baseurl)+12)}}">
                        </div>
                    </div>
                    <div class="">
                        <div class="form-group m-2">
                            <strong>active:</strong>
                            <input type="textbox" size="1" name="active" class="form-control"  value="{{$qrredirect->active}}" readonly>

                        </div>
                    </div>
                    <div class="">
                        <div class="form-group m-2">
                            <strong>user</strong>
                            <input type="text" name="user_id" class="form-control" placeholder="{{ auth()->user()->id }}" value="{{ auth()->user()->id }}" readonly>
                        </div>
                    </div>
                    <div class="">
                    <div class=" form-group m-2">
                        <strong>guardar</strong>
                        <button type="submit" class=" form-control btn btn-primary">Submit</button>
                    </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection