@extends('layouts.main')

@section('title', 'Category')

@section('breadcump')
    <li class="breadcrumb-item active" aria-current="page">Category</li>
@endsection

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
    @endif
    <div class="card">
        <div class="card-body">
            <h4>Categories</h4>
            <a href="{{ route('category.create') }}" class="btn btn-primary mt-2 mb-2">Create new category</a>
            <div class="table-responsive mt-3 mb-3">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->created_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route('category.edit', $category) }}" class="btn btn-warning d-inline">Edit</a>
                            <form action="{{ route('category.destroy', $category) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Delete this category? All data with this category will be deleted')"
                                        class="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
