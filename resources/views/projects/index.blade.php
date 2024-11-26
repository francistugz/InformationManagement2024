@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container-fluid">
            <div class="pull-left">
                <h2>Tugonon Construction Services and Supply </h2>
            </div>
            
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

<div class="container-fluid">

        <table class="table table-bordered table-responsive-lg table-hover">
            <thead class="thead-dark">
                <tr>
                    <th style="width: 16%;">ID</th>
                    <th style="width: 16%;">Title</th>
                    <th style="width: 16%;">Location</th>
                    <th style="width: 16%;">Cost</th>
                    <th style="width: 16%;">Date Started</th>
                    <th style="width: 16%;">Action</th>
                </tr>
        @foreach ($projects as $project)
            <tr>
                <td>{{ $project->id }}</td>
                <td>{{ $project->title }}</td>
                <td>{{ $project->location }}</td>
                <td>{{ $project->cost }}</td>
                <td>{{ date_format($project->created_at, 'jS M Y') }}</td>
                <td>
                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST">

                        <a href="{{ route('projects.show', $project->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('projects.edit', $project->id) }}">
                            <i class="fas fa-edit  fa-lg"></i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
    {!! $projects->links() !!}

@endsection
