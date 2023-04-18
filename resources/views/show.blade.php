@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    Category Details
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <h3>{{ $category->name }}</h3>
                            <p>Status: {{ $category->active == 'Y' ? 'Active' : 'Inactive' }}</p>
                            <p>Created At: {{ $category->created_at }}</p>
                            <p>Updated At: {{ $category->updated_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
