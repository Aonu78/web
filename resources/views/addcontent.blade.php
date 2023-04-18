@extends('layouts.theme')
@section('content')

<div class="app-wrapper">
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">			    
        <h1 class="app-page-title">Content</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-3">
                <h3 class="section-title">Featured City</h3>
               
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
                    
                        <form class="settings-form" method="POST" action="{{ route('add.city') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">City</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" class="form-control" id="country" name="country" required>
                            </div>
                            <div class="col-auto">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <div class="col-auto mb-3">
                                <label for="position" class="form-label">Position</label>
                                <select class="form-select w-auto" id="position" name="position">
                                    <option selected value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                            <button type="submit" class="btn app-btn-primary">Add City</button>
                        </form>
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div>
            
        </div><!--//row-->
    </div>
</div>
</div>

<script>
    
</script>



@endsection