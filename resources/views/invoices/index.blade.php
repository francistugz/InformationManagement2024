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
        
                    <th style="width: 14%;">ID</th>
                    <th style="width: 14%;">Title</th>
                    <th style="width: 14%;">clientID</th>
                    <th style="width: 14%;">projectID</th>
                    <th style="width: 14%;">Total Due</th>
                    <th style="width: 14%;">Due Date</th>
                    <th style="width: 25%;">Action</th>
                </tr>
            </thead>
        @foreach ($invoices as $invoice)
            <tr>
                <td>{{ $invoice->id }}</td>
                <td>{{ $invoice->title }}</td>
                <td>{{ $invoice->clientID }}</td>
                <td>{{ $invoice->projectID }}</td>
                <td>{{ $invoice->TotalDue }}</td>
                <td>{{ date_format($invoice->created_at, 'jS M Y') }}</td>
                <td>
                    <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST">

                        <a href="{{ route('invoices.show', $invoice->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('invoices.edit', $invoice->id) }}">
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
    {!! $invoices->links() !!}

@endsection
