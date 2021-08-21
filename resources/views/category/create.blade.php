@extends('layouts.main')

@section('title', 'Category')

@section('breadcump')
    <li class="breadcrumb-item">Category</li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <h4>Categories</h4>
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf

                        @include('category._form')

                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Save</button>
                            <a href="{{ route('category.index') }}" class="btn btn-secondary mt-2 mb-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
