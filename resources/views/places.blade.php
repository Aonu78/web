@extends('layouts.theme')
@section('content')
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<div class="app-wrapper">
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">			    
        <h1 class="app-page-title">Content</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            {{-- <div class="col-12 col-md-3">
                <h3 class="section-title">Places</h3>
               
            </div> --}}

          

            <div class="col-12 col-md-12">
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
                    
                    <form class="settings-form" method="POST" action="{{ route('places.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="description" name="description" required>
                        </div>
                        <div class="mb-3">
                            <label for="branch" class="form-label">Branch</label>
                            <input type="text" class="form-control" id="branch" name="branch" required>
                        </div>
                        <div class="col-auto">
                            <label for="icon" class="form-label">Icon</label>
                            <input type="file" class="form-control" id="icon" name="icon">
                        </div>
                        <div class="col-auto">
                            <label for="bgimage" class="form-label">Background Image</label>
                            <input type="file" class="form-control"  id="bgimage" name="bgimage">
                        </div>
                        <BR>
                            <div class="row">
                                <div class="mb-3 col-lg-6">
                                    <label class="form-check-label" for="cards">Select city</label>
                                    <select class="form-select select2 w-auto" name="city" required>
                                        <option value="">-- Select a city --</option>
                                        @foreach($cities as $id => $name)
                                        <option value="{{ $id }}|{{ $name }}" {{ old('city') == $id ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                            
                                <div class="mb-3 col-lg-6">
                                    <label class="form-check-label" for="category">Select Category</label>
                                    <select class="form-select select2 w-auto" name="category_id" required>
                                        <option value="">-- Select a Category --</option>
                                        @foreach($Category as $id => $name)
                                        <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <br>
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-check-label" for="card">Select Card</label>
                                        <select class="form-select select2 w-auto" name="card_id" required>
                                            <option value="">-- Select a Card --</option>
                                            @foreach($cards as $id => $name)
                                                <option value="{{ $id }}" {{ old('card_id') == $id ? 'selected' : '' }}>
                                                    {{ $name }}
                                                </option>
                                            @endforeach
                                        </select>
                                                                

                                        <div class="form-check form-switch mb-3">
                                            <input class="form-check-input" type="checkbox" id="active" name="active" checked>
                                            <label class="form-check-label" for="active">Active</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="percentage" class="form-label">Discount Percentage</label>
                                        <input type="number" class="form-control" id="percentage" name="percentage" min="0" max="100" required>
                                    </div>
                                </div>
                            </div>
                            
                      
                            
                            <script>
                                $(document).ready(function() {
                                  $('.select2').select2();
                                });
                              </script>

                        <BR>
                            
                        </div>
                        <BR>
                        <div class="row">
                            <div class="col-lg-12">
                                <label class="form-check-label">Opening Hours</label>
                            </div>
                            @foreach(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
                             <div class="col-lg-3">
                              <div class="mb-3">
                              <label for="{{ $day }}" class="form-label">{{ ucfirst($day) }}</label>
                              <div class="row">
                              <div class="col-6">
                              <input type="time" class="form-control" id="{{ $day }}_open" name="{{ $day }}_open" >
                               </div>
                               <div class="col-6">
                              <input type="time" class="form-control" id="{{ $day }}_close" name="{{ $day }}_close" >
                              </div>
                              </div>
                              </div>
                              </div>
                              @endforeach



                        </div>
                        <div class="row">
                            
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="terms_and_conditions" class="form-label"> Terms and Conditions</label>
                                        <textarea class="form-control" id="terms_and_conditions" name="terms_and_conditions" style="height: 80px;"></textarea>
                                    </div>
                                </div>
                            
                        </div>

                        
                        
                        <div class="mb-3">          
                          <div class="row">
                          <div class="mb-3 col-lg-6" >
                            <label for="contact" class="form-label">Contact Number</label>
                            <input type="number" class="form-control" id="number" name="number" >
                        </div>
                          

                        <div class="mb-3 col-lg-6">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" >
                        </div>
                    </div>
                    


                        <button type="submit" class="btn app-btn-primary">Add Place</button>
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
                    <h1 class="app-page-title mb-0">Places</h1>
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
                                            <th class="cell">Places</th>
                                            <th class="cell">Branch</th>
                                            <th class="cell">City</th>
                                            <th class="cell">Status</th>
                                            <th class="cell">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                          $places = DB::table('places')
                                              ->leftJoin('city', 'places.city', '=', 'city.name')
                                              ->leftJoin('cities', 'places.city', '=', 'cities.name')
                                              ->select('places.*', DB::raw('COALESCE(city.name, cities.name) as city_name'))
                                              ->orderBy('places.city')
                                              ->get();

                                           
                                        @endphp
                                        
                                        @foreach ($places as $place)
                                        <tr>
                                            <td class="cell">{{ $loop->iteration }}</td>
                                            <td class="cell">{{ $place->name }}</td>
                                            <td class="cell">{{ $place->branch }}</td>
                                            <td class="cell">{{ $place->city_name }}</td>
                                            
                                            <td class="cell">
                                                @if ($place->place_active == 'Y')
                                                <span class="badge bg-success">Active</span>
                                                @else
                                                <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td class="cell">
                                                <a href="{{ route('places.edit', ['id' => $place->id]) }}" class="btn-sm app-btn-secondary">Update</a>

                                                {{-- <a href="{{ route('places.edit', $place->id) }}" class="btn-sm app-btn-secondary">Update</a> --}}
                                                {{-- <form action="{{ route('places.destroy', $place->id) }}" method="POST" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-sm app-btn-secondary">Delete</button>
                                                </form> --}}
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

@push('scripts')



@endpush


@endsection