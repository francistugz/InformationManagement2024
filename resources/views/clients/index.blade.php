@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
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

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Contact Number</th>
            <th>Tin</th>
            <th>Email</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->fname }}</td>
                <td>{{ $client->lname }}</td>
                <td>{{ $client->contactno }}</td>
                <td>{{ $client->client_tin}}</td>
                <td>{{ $client->client_email}}</td>
                
                <td>
                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST">

                        <a href="{{ route('clients.show', $client->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('clients.edit', $client->id) }}">
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

    {!! $clients->links() !!}
    <center>
                <a class="btn btn-success" href="{{ route('clients.create') }}" title="Add client"> <i class="fas fa-plus-circle"></i>
                    </a>
        

@endsection
