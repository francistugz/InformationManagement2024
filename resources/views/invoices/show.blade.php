@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>Invoice no: {{ $invoice->id }}</h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('invoices.index') }}" title="Go back"> <i
                        class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Date Issued:</strong>
            {{ $invoice->Date}}
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ClientID:</strong>
                {{ $invoice->clientID }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Project No:</strong>
                {{ $invoice->projectID }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Total Due:</strong>
                {{ $invoice->TotalDue }}
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Due Date:</strong>
                {{ $invoice->DueDate }}
            </div>
        </div>

    </div>
@endsection
