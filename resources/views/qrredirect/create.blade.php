@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Product</h2>
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
    <div class="card">


        <div class="card-body">
    <form action="{{ route('qrredirect.store') }}" method="POST" >
        @csrf

        <div class="row">
            <div class="form-group m-2">
                <div class="form-group">
                    <strong>soureURL:</strong>
                    <input type="text" name="soureURL" class="form-control" placeholder="soureURL">
                </div>
            </div>
            <div class="form-group m-2">
                <div class="form-group">
                    <strong>destinyURL:</strong>
                    <textarea class="form-control" style="height:50px" name="destinyURL"
                              placeholder="destinyURL"></textarea>
                </div>
            </div>
            <div class="form-group m-2">
                <div class="form-group">
                    <strong>active:</strong>
                    <input type="text" name="active" class="form-control" placeholder="active">
                </div>
            </div>
            <div class="form-group m-2">
                <div class="form-group">
                    <strong>user_id:</strong>
                    <input type="text" name="user_id" class="form-control" placeholder="user_id">
                </div>
            </div>
            <div class="form-group m-2">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>


    </form>
    </div>
</div>
@endsection