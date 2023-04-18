@extends('../layouts.theme')
@section('content')
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Other Cities</h1>
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
                    <form action="{{ route('othercities.update', $othercities->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name"> Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $othercities->name }}">
                        </div>
                        <div class="form-group">
                            <label for="name"> Country</label>
                            <input type="text" name="country" id="country" class="form-control" value="{{ $othercities->country }}">
                        </div>
                        <BR>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image_path" id="image_path" class="form-control-file">
                                @if ($othercities->image_path)
                                    <img src="{{ asset('storage/' . $othercities->image_path) }}" alt="{{ $othercities->name }}" height="80">
                                @endif
                            </div>
                            
                        <BR>
                        <div class="form-group">
                            <label for="active">Status</label>
                            <select name="active" id="active" class="form-control">
                                <option value="Y" {{ $othercities->active == 'Y' ? 'selected' : '' }}>Active</option>
                                <option value="N" {{ $othercities->active == 'N' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        <BR>
                       
                        <button class="btn-sm app-btn-success" type="submit" >Update</button>



                    </form>
                    
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>

                        
      
@endsection
