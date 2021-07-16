@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>QR configurado </h2>
            </div>
            @if(Auth::user()->isAdmin())
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('qrredirect.create') }}" title="Create a redirect"> Nuevo QR
                </a>
            </div>
                @endif
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>soureURL</th>
            <th>destinyURL</th>
            <th>active</th>
            <th>user_id</th>
            <th>Date Created</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($qrredirects as $qrredirect)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $qrredirect->soureURL }}</td>
                <td>{{ $qrredirect->destinyURL }}</td>
                <td>{{ $qrredirect->active }}</td>
                <td>{{ $qrredirect->user_id }}</td>
                <td>{{ date_format($qrredirect->created_at, 'jS M Y') }}</td>
                <td>

                    <form action="{{ route('qrredirect.destroy', $qrredirect->id) }}" method="POST">
                        @if(Auth::user()->isAdmin())
                        <a href="{{ route('qrredirect.show', $qrredirect->id) }}" title="show" class="btn btn-primary">
                            Ver                        </a>

                        <a href="{{ route('qrredirect.edit', $qrredirect->id) }}" class="btn btn-primary">
                            Edit

                        </a>
                        @endif


                        <input type="hidden" name="id" value="{{$qrredirect->id}}">
                        @csrf
                        @method('DELETE')

                        <button>Delete QR</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $qrredirects->links() !!}

@endsection