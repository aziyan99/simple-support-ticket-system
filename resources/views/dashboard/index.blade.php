@extends('layouts.main')

@section('title', 'Dashboard')

@section('breadcump')
<li class="breadcrumb-item active" aria-current="page">Index</li>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3 text-center">
                <div class="card bg-light">
                    <div class="card-body">
                        <h4>{{ $adminCount }}</h4>
                        <small>Total Admin</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="card bg-light">
                    <div class="card-body">
                        <h4>{{ $agentCount }}</h4>
                        <small>Total Agent</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="card bg-light">
                    <div class="card-body">
                        <h4>{{ $customerCount }}</h4>
                        <small>Total Customer</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="card bg-light">
                    <div class="card-body">
                        <h4>{{ $ticketCount }}</h4>
                        <small>Total Ticket</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
