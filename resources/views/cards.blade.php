@extends('layouts.theme')
@section('content')

<div class="app-wrapper">
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">			    
        <h1 class="app-page-title">Content</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-3">
                <h3 class="section-title">Discount Cards</h3>
               
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
                    
                    <form class="settings-form" method="POST" action="{{ route('cards.store') }}" enctype="multipart/form-data">

                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Card</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            
                            <div class="col-auto">
                                <label for="image" class="form-label">Icon</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Bank Name</label>
                                <input type="text" class="form-control" id="bank" name="bank" required>
                            </div>

                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="active" name="active" checked>
                                <label class="form-check-label" for="active">Active</label>
                            </div>
                            


                            
                            <button type="submit" class="btn app-btn-primary">Add Card</button>
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
                    <h1 class="app-page-title mb-0">Cards</h1>
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
                                          $cards = DB::table('cards')->get();
                                        @endphp
                                        @foreach ($cards as $card)
                                        <tr>
                                            <td class="cell">{{ $loop->iteration }}</td>
                                            <td class="cell">{{ $card->name }}</td>
                                            
                                            <td class="cell">
                                                @if ($card->active == 'Y')
                                                <span class="badge bg-success">Active</span>
                                                @else
                                                <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td class="cell">
                                                <a href="{{ route('card.edit', $card->id) }}" class="btn-sm app-btn-secondary">Update</a>
                                                <form action="{{ route('cards.destroy', $card->id) }}" method="POST" class="d-inline-block">
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



@endsection