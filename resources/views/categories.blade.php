@extends('layouts.theme')
@section('content')

<div class="app-wrapper">
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">			    
        <h1 class="app-page-title">Content</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-3">
                <h3 class="section-title">Category</h3>
               
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
                    
                        <form class="settings-form" method="POST" action="{{ route('add.category') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Category</label>
                                <input type="text" class="form-control" id="category" name="name" required>
                            </div>
                         
                            <div class="col-auto">
                                <label for="image" class="form-label">Icon</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <Br>

                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="active" name="active" checked>
                                <label class="form-check-label" for="active">Active</label>
                            </div>
                            
                            {{-- <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="settings-switch-1" checked>
                                <label class="form-check-label" for="settings-switch-1">Active</label>
                            </div> --}}



                            <button type="submit" class="btn app-btn-primary">Add Category</button>
                        </form>
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div>
            
        </div><!--//row-->
    </div>
</div>
</div>


<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Category</h1>
                </div>
            </div>

            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                @if(session('success'))
                                  <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                <table class="table app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">Sr#</th>
                                            <th class="cell">Category</th>
                                            
                                            <th class="cell">Status</th>
                                            <th class="cell">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                          $categories = DB::table('categories')->get();
                                        @endphp
                                        @foreach ($categories as $category)
                                        <tr>
                                            <td class="cell">{{ $loop->iteration }}</td>
                                            <td class="cell">{{ $category->name }}</td>
                                            
                                            <td class="cell">
                                                @if ($category->active == 'Y')
                                                <span class="badge bg-success">Active</span>
                                                @else
                                                <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td class="cell">
                                                <a class="btn-sm app-btn-secondary" href="{{ route('categories.edit', $category->id) }}">Update</a>
                                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-sm app-btn-secondary">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>



            


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    // Get the modal
    var modal = document.getElementById("myModal");
    
    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");
    
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    
    // When the user clicks the button, open the modal 
    btn.onclick = function() {
      modal.style.display = "block";
    }
    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    </script>




@endsection