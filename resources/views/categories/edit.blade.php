@extends('../layouts.theme')
@section('content')
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Categories</h1>
                </div>
             


                <div class="col-12 col-md-9">
                    <div class="app-card app-card-settings shadow-sm p-4">
                        <div class="app-card-body">
                            @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        
                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}">
                        </div>
                        <div class="form-group">
                            <label for="image">Category Image</label>
                            <input type="file" name="image" id="image" class="form-control-file">
                            @if ($category->image)
                                <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" height="50">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="active">Status</label>
                            <select name="active" id="active" class="form-control">
                                <option value="Y" {{ $category->active == 'Y' ? 'selected' : '' }}>Active</option>
                                <option value="N" {{ $category->active == 'N' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn-sm app-btn-secondary">Update</button>


                    </form>
                    
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>

                        
      
@endsection
