@php
    $perPage = 10;
    $othercities = DB::table('cities')
        ->orderBy('cities.name');
    if(request()->has('search')){
        $searchTerm = request()->get('search');
        $othercities = $othercities->where('cities.name','LIKE','%'.$searchTerm.'%');
        $searchResults = $othercities->count() . ' Search Results for "' . $searchTerm . '"';
    } else {
        $searchResults = '';
    }
    $othercities = $othercities->paginate($perPage);
@endphp

<tr>
    <td colspan="5" style="text-align: center;">{{ $searchResults }}</td>
</tr>

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
            <a href="{{ route('places.edit', ['id' => $othercity->id]) }}" class="btn-sm app-btn-secondary">Update</a>
            {{-- <a href="{{ route('places.edit', $place->id) }}" class="btn-sm app-btn-secondary">Update</a> --}}
            {{-- <form action="{{ route('places.destroy', $place->id) }}" method="POST" class="d-inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-sm app-btn-secondary">Delete</button>
            </form> --}}
        </td>
    </tr>
@endforeach

{{ $othercities->appends(request()->except('page'))->links() }}

@if(request()->ajax())
    <script>
        $(function() {
            $('#search-button').click(function() {
                var query = $('#search').val();
                $.ajax({
                    url: "{{ route('othercities.index') }}",
                    type: "GET",
                    data: {search: query},
                    success: function(data) {
                        $('#cities-table').html(data);
                    }
                });
            });
        });
    </script>
@endif
