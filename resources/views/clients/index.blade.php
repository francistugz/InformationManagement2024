@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container-fluid">
            <div class="pull-left">
                <h3>Tugonon Construction Services and Supply </h3>
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
    
            <th style="width: 14%;">ID</th>
            <th style="width: 14%;">First Name</th>
            <th style="width: 14%;">Last Name</th>
            <th style="width: 14%;">Contact Number</th>
            <th style="width: 14%;">Tin</th>
            <th style="width: 14%;">Email</th>
            <th style="width: 25%;">Action</th>
            </tr>
        </thead>
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
</div>

    {!! $clients->links() !!}
    <center>
                <a class="btn btn-success" href="{{ route('clients.create') }}" title="Add client"> <i class="fas fa-plus-circle"></i>
                    </a>
        

@endsection
