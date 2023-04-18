@extends('../layouts.theme')
@section('content')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-12">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">




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
                                <form action="{{ route('places.update', ['id' => $places->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name', $places->name) }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <input type="text" class="form-control" id="description" name="description"
                                            value="{{ old('description', $places->description) }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="branch" class="form-label">Branch</label>
                                        <input type="text" class="form-control" id="branch" name="branch"
                                            value="{{ old('branch', $places->branch) }}" required>
                                    </div>

                                    <div class="col-auto">
                                        <label for="icon" class="form-label">Icon</label>
                                        <input type="file" class="form-control" id="icon" name="icon">
                                        @if ($places->icon)
                                            <p>Current icon:</p>
                                            <img src="{{ asset('storage/' . $places->icon) }}"
                                                alt="{{ $places->name }}" style="max-width: 50px; height:50px;">
                                        @endif

                                    </div>

                                    <div class="col-auto">
                                        <label for="bgimage" class="form-label">Background Image</label>
                                        <input type="file" class="form-control" id="bgimage" name="bgimage">
                                        @if ($places->bg_image)
                                            <p>Current background image:</p>
                                            <img src="{{ asset('storage/' . $places->bg_image) }}"
                                                alt="{{ $places->name }}" style="max-width: 50px; height:50px;">
                                        @endif
                                    </div>

                                    <br>

                                    <div class="row">
                                        <div class="mb-3 col-lg-6">
                                            <label class="form-check-label" for="cards">Select city</label>
                                            <select class="form-select select2 w-auto" name="city" required>
                                                <option value="">-- Select a city --</option>
                                                @foreach ($cities as $id => $name)
                                                    <option value="{{ $id }}|{{ $name }}"
                                                        {{ old('city') == $id || $oldCity == $name ? 'selected' : '' }}>
                                                        {{ $name }}
                                                    </option>
                                                @endforeach
                                            </select>


                                        </div>

                                        <BR>
                                        <div class="mb-3 col-lg-6">
                                            <label class="form-check-label" for="category">Select Category</label>
                                            <select class="form-select select2 w-auto" name="category_id" required>
                                                <option value="">-- Select a Category --</option>
                                                @foreach ($Category as $id => $name)
                                                    <option value="{{ $id }}"
                                                        {{ old('category_id', $places->category_id) == $id ? 'selected' : '' }}>
                                                        {{ $name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>



                                        <div class="mb-3 col-lg-6">
                                            <label class="form-check-label" for="card">Select Card</label>
                                            <select class="form-select select2 w-auto" name="card_id" required>
                                                <option value="">-- Select a Card --</option>
                                                @foreach ($cards as $id => $name)
                                                    <option value="{{ $id }}"
                                                        {{ old('card_id') == $id || $places->card_id == $id ? 'selected' : '' }}>
                                                        {{ $name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-check form-switch mb-3">
                                                    <label for="active">Status</label>
                                                    <select name="active" id="active" class="form-control">
                                                        <option value="Y" {{ $places->active == 'Y' ? 'selected' : '' }}>
                                                            Active</option>
                                                        <option value="N" {{ $places->active == 'N' ? 'selected' : '' }}>
                                                            Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="percentage" class="form-label">Discount Percentage</label>
                                                    <input type="number" class="form-control" id="percentage" name="percentage"
                                                        value="{{ old('percentage', $places->percentage) }}" min="0"
                                                        max="100" required>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <script>
                                            $(document).ready(function() {
                                              $('.select2').select2();
                                            });
                                          </script>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label class="form-check-label">Opening Hours</label>
                                            </div>
                                            @foreach (['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="{{ $day }}"
                                                            class="form-label">{{ ucfirst($day) }}</label>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <input type="time" class="form-control"
                                                                    id="{{ $day }}_open"
                                                                    name="{{ $day }}_open"
                                                                    value="{{ old($day . '_open', $oldData[$day . '_open'] ?? '') }}">
                                                            </div>
                                                            <div class="col-6">
                                                                <input type="time" class="form-control"
                                                                    id="{{ $day }}_close"
                                                                    name="{{ $day }}_close"
                                                                    value="{{ old($day . '_close', $oldData[$day . '_close'] ?? '') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach


                                        </div>

                                        <div class="row">

                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="terms_and_conditions" class="form-label"> Terms and
                                                        Conditions</label>
                                                    <textarea class="form-control" id="terms_and_conditions" name="terms_and_conditions" style="height: 80px;">{{ old('terms_and_conditions', $places->terms_and_conditions) }}</textarea>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="mb-3 col-lg-6">
                                                    <label for="contact" class="form-label">Contact Number</label>
                                                    <input type="number" class="form-control" id="number"
                                                        value="{{ old('number', $places->number) }}"
                                                        name="number">
                                                </div>


                                                <div class="mb-3 col-lg-6">
                                                    <label for="address" class="form-label">Address</label>
                                                    <input type="text" class="form-control" id="address"
                                                        value="{{ old('address', $places->address) }}" name="address">
                                                </div>
                                            </div>






                                            <div class="form-group">
                                                <label for="place_active">Place Status</label>
                                                <select name="place_active" id="place_active" class="form-control">
                                                    <option value="Y"
                                                        {{ $places->place_active == 'Y' ? 'selected' : '' }}>Active
                                                    </option>
                                                    <option value="N"
                                                        {{ $places->place_active == 'N' ? 'selected' : '' }}>Inactive
                                                    </option>
                                                </select>
                                            </div>
                                            <BR>
                                                <button type="submit" class="btn btn-primary">Update Place</button>
                                            {{-- <a href="{{ route('places.update', ['id' => $id]) }}" class="btn btn-primary">Update Place</a> --}}


                                            {{-- <a class="btn-sm app-btn-secondary"
                                                href="{{ route('places.update', ['places' => $places->id]) }}">Update</a> --}}

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
