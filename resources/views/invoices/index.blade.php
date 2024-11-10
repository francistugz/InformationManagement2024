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
            <th>No</th>
            <th>Name</th>
            <th>Description</th>
            <th>Total Due</th>
            <th>Due Date</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($invoices as $invoice)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $invoice->name }}</td>
                <td>{{ $invoice->description }}</td>
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
    
    <center>
    <div class="pull-right">
                <a class="btn btn-success" href="{{ route('invoices.create') }}" title="Create a invoice"> <i class="fas fa-plus-circle"></i>
                    </a>
    </div>
    {!! $invoices->links() !!}

@endsection
