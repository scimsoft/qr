
@extends('layouts.app')

@section('content')

    <div style="width:800px; margin:0 auto;">
    <form method="POST" action="generate">
        @csrf
        <label class="col-form-label" >QR link data</label>
        <input type="text" class="form-control" name="mybaseurl" placeholder="Base Url">
        <div>&nbsp;</div>
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" name="startrange" placeholder="Start range">
            </div>
            <div class="col">
                <input type="text" class="form-control" name="endrange" placeholder="End range">
            </div>
        </div>
        <div>&nbsp;</div>
        <button type="submit" class="btn btn-primary">Generate</button>
    </form>
    </div>


@endsection