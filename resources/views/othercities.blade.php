@extends('layouts.theme')
@section('content')

<div class="app-wrapper">
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">			    
        <h1 class="app-page-title">Content</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-3">
                <h3 class="section-title">Other Cities</h3>
               
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
                    
                    <form class="settings-form" method="POST" action="{{ route('add.othercity') }}" enctype="multipart/form-data">

                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">City</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" class="form-control" id="country" name="country" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image_path" id="image_path" class="form-control-file">
                            </div>
                            <BR>
                            <button type="submit" class="btn app-btn-primary">Add City</button>
                        </form>
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div>
            
        </div><!--//row-->

    </div>

<BR>


    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        @if(session('success'))
                          <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <form  method="GET" class="mb-3">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search cities" name="search">
                                <button type="submit" class="btn btn-outline-secondary" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
    
                        <table class="table app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">Sr#</th>
                                    <th class="cell">City</th>
                                    <th class="cell">Country</th>
                                    <th class="cell">Status</th>
                                    <th class="cell">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $perPage = 10;
                             $othercities = DB::table('cities')
                             ->orderBy('cities.name');
                             if(request()->has('search')){
                             $searchTerm = request()->get('search');
                             $othercities = $othercities->where('cities.name','LIKE','%'.$searchTerm.'%');
                             }
                             $othercities = $othercities->simplePaginate($perPage);

                            // display pagination links in your view



                                @endphp
    
                                @foreach ($othercities as $othercity)
                                <tr>
                                    <td class="cell">{{ $loop->iteration }}</td>
                                    <td class="cell">{{ $othercity->name }}</td>
                                    <td class="cell">{{ $othercity->country }}</td>
                                  
    
                                    <td class="cell">
                                        @if ($othercity->active == 'Y')
                                        <span class="badge bg-success">Active</span>
                                        @else
                                        <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="cell">
                                        <a href="{{ route('othercities.edit', ['id' => $othercity->id]) }}" class="btn-sm app-btn-secondary">Update</a>
                                        <form action="{{ route('othercities.destroy', $othercity->id) }}" method="POST" class="d-inline-block">
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
                    <BR><br>
                        <div id="cities-table">
                            <table class="table app-table-hover mb-0 text-left">
                                <!-- table body -->
                            </table>
                            <div class="d-flex justify-content-center">
                                {!! $othercities->appends(request()->except('page'))->onEachSide(1)->links() !!}
                            </div>
                        </div>
 
                </div>
                
            </div>

        </div>
        
        
    </div>
    




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script>
        $(document).ready(function() {
            $(document).on('keyup', 'input[name="search"]', function(event) {
                event.preventDefault();
                var search_term = $(this).val();
                $.ajax({
                    url: '{{ route("places.search") }}',
                    type: 'GET',
                    dataType: 'JSON',
                    data: {
                        search: search_term
                    },
                    success: function(response) {
                        console.log(response);
                        var html = '';
                        $.each(response.cities.data, function(index, city) {
                            html += '<tr>' +
                                '<td class="cell">' + (index + 1) + '</td>' +
                                '<td class="cell">' + city.name + '</td>' +
                                '<td class="cell">' + city.country + '</td>' +
                                '<td class="cell">' + (city.active == 'Y' ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>') + '</td>' +
                                '<td class="cell">' +
                                '<a href="/othercities/' + city.id + '/edit" class="btn-sm app-btn-secondary">Update</a>'+
                                '<a href="#" class="btn-sm app-btn-secondary delete-btn" data-city-id="' + city.id + '">Delete</a>' +
                                '</td>' +
                                '</tr>';
                        });
                        $('table.app-table-hover tbody').html(html);
                        $('.pagination').html(response.cities.links);
        
                        // Attach a click event listener to the delete button
                        $('.delete-btn').click(function(e) {
                            e.preventDefault();
        
                            // Get the city ID from the data attribute
                            var cityId = $(this).data('city-id');
        
                            // Send an AJAX request to the delete route
                            $.ajax({
                            url: '/othercities/' + cityId,
                            type: 'DELETE',
                            data: {
                           _token: '{{ csrf_token() }}'
                            },
                           success: function(response) {
                          console.log('Successfully deleted!');
                          // Reload the page after successful deletion
                          location.reload()
                            },

                           error: function(response) {
                          console.log(response);
                          }
                         });

                        });
                    },
                    error: function(response) {
                        console.log(response);
                    }
                });
            });
        });
        </script>
        
        
        


@endsection