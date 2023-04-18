@extends('../layouts.theme')
@section('content')
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Card</h1>
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
                    <form action="{{ route('card.update', $card->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Card Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $card->name }}">
                        </div>
                        <div class="form-group">
                            <label for="name">Card Bank</label>
                            <input type="text" name="bank" id="bank" class="form-control" value="{{ $card->bank }}">
                        </div>
                        <BR>
                        <div class="form-group">
                            <label for="image">Card Image</label>
                            <input type="file" name="image" id="image" class="form-control-file">
                            @if ($card->image)
                                <img src="{{ asset($card->image) }}" alt="{{ $card->name }}" height="50">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="active">Status</label>
                            <select name="active" id="active" class="form-control">
                                <option value="Y" {{ $card->active == 'Y' ? 'selected' : '' }}>Active</option>
                                <option value="N" {{ $card->active == 'N' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div><BR>
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
