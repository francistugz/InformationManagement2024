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

<div class="container-fluid">

        <table class="table table-bordered table-responsive-lg table-hover">
            <thead class="thead-dark">
                <tr>
        
                    <th style="width: 16%;">ID</th>
                    <th style="width: 16%;">clientID</th>
                    <th style="width: 16%;">Amount Paid</th>
                    <th style="width: 16%;">Date Paid</th>
                    <th style="width: 16%;">Method</th>
                    <th style="width: 17%;">Action</th>
                </tr>
            </thead>
        @foreach ($payments as $payment)
            <tr>
                <td>{{ $payment->id }}</td>
                <td>{{ $payment->clientID }}</td>
                <td>{{ $payment->amount }}</td>
                <td>{{ $payment->date }}</td>
                <td>{{ $payment->method }}</td>
                
                <td>
                    <form action="{{ route('payments.destroy', $payment->id) }}" method="POST">

                        <a href="{{ route('payments.show', $payment->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('payments.edit', $payment->id) }}">
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
    {!! $payments->links() !!}
@endsection
