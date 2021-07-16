@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('qrredirect.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
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

    <form action="{{ route('qrredirect.update', $qrredirect->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>QR ID:</strong>
                    <input type="text" name="soureURL" value="{{ $qrredirect->soureURL }}" class="form-control" placeholder="soureURL">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">

                    <strong>TableNumber:</strong>
                    <input type="text" class="form-control" name="destinyURL" placeholder="{{substr($qrredirect->destinyURL,strlen(auth()->user()->baseurl))}}" vlaue="{{substr($qrredirect->destinyURL,strlen(auth()->user()->baseurl)+12)}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>active:</strong>
                    <input type="text" name="active" class="form-control" placeholder="{{ $qrredirect->active }}"
                           value="{{ $qrredirect->active }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>user_id:</strong>
                    <input type="number" name="user_id" class="form-control" placeholder="{{ $qrredirect->user_id }}"
                           value="{{ $qrredirect->user_id }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection