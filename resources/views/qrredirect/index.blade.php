@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('qrredirect.create') }}" title="Create a redirect"> <i class="fas fa-plus-circle"></i>
                </a>
            </div>
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
        @foreach ($qrredirect as $project)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $project->soureURL }}</td>
                <td>{{ $project->destinyURL }}</td>
                <td>{{ $project->active }}</td>
                <td>{{ $project->user_id }}</td>
                <td>{{ date_format($project->created_at, 'jS M Y') }}</td>
                <td>
                    <form action="{{ route('qrredirect.destroy', $project->id) }}" method="POST">

                        <a href="{{ route('qrredirect.show', $project->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg">ver</i>
                        </a>

                        <a href="{{ route('qrredirect.edit', $project->id) }}">
                            <i class="fas fa-edit  fa-lg">edit</i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger">del</i>

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $qrredirect->links() !!}

@endsection