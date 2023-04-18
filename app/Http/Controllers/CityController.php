<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\City;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class CityController extends Controller
{
    public function create()
    {
        return view('city.create');
    }
    public function search(Request $request)
    {
        $perPage = 10;
        $othercities = DB::table('cities')->orderBy('name');
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $othercities = $othercities->where('name', 'LIKE', '%'.$searchTerm.'%');
            $searchResults = $othercities->count() . ' Search Results for "' . $searchTerm . '"';
        } else {
            $searchResults = '';
        }
        $othercities = $othercities->paginate($perPage);
    
        if ($request->ajax()) {
            return view('partials.city_table', compact('othercities', 'searchResults'));
        }
    
        return view('othercities', compact('othercities', 'searchResults'));
    }
    
    
    




    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'image' => 'required|image|max:2048',
        'position' => 'required|integer|min:1|max:6'
    ]);

    $city = new City;
    $city->name = $validatedData['name'];
    $city->country = $validatedData['country'];
    $city->position = $validatedData['position'];

    // Check if position is already taken
    $existingCity = City::where('position', $validatedData['position'])->first();
    if ($existingCity) {
        return back()->withErrors(['position' => 'Position already taken.'])->withInput();
    }

    $imagePath = $validatedData['image']->store('cities', 'public');
    $city->image = $imagePath;

    $city->save();

    session()->flash('success', 'City added successfully.');

    return back();
}



public function addOtherCity(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);
    
    $data = [
        'name' => $request->input('name'),
        'country' => $request->input('country'),
        'position' => null, // set default position as null
    ];
    
    try {
        // handle image upload
        if ($request->hasFile('image_path')) {
            $validatedData = $request->validate([
                'image_path' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            
            $imagePath = $validatedData['image_path']->store('cities', 'public');
            $data['image_path'] = $imagePath;
        }
    
        // insert data into database
        DB::table('cities')->insert($data);
    
        // create table for the cities if it doesn't exist
        DB::statement('CREATE TABLE IF NOT EXISTS cities (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            country VARCHAR(255) NOT NULL,
            position INT UNSIGNED NULL,
            image_path VARCHAR(255) NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )');
    
        return redirect()->back()->with('success', 'City added successfully!');
    } catch (\Throwable $th) {
        return redirect()->back()->with('error', 'Error occurred while adding city!');
    }
    
}





    public function edit(City $city)
    {
        return view('city.edit', compact('city'));
    }

    public function update(Request $request, City $city)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'position' => 'required|integer|min:1|max:6'
        ]);

        $city->name = $validatedData['name'];
        $city->position = $validatedData['position'];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('cities', 'public');
            $city->image = $imagePath;
        }

        $city->save();

        return redirect()->route('home')->with('success', 'City updated successfully.');
    }

    public function destroy(City $city)
    {
        $city->delete();

        return redirect()->route('home')->with('success', 'City deleted successfully.');
    }

    
    // public function viewcities()
    // {
    //     $cities = City::all();
    //     dd($cities); // Add this line to check if you are getting data
    //     return view('welcome', ['cities' => $cities]);
    // }
    

    public function viewcities()
    {
        $data = DB::table('city')
                    ->where('active', 'Y')
                    ->orderBy('position', 'asc')
                    ->get();
        $otherCities = DB::table('cities')
                    ->where('active', 'Y')
                    ->orderBy('name', 'asc')
                    ->get();
        return view('welcome', compact('data', 'otherCities'));
    }
    




    public function show($name)
    {
        $city = DB::table('city')
                ->select('name', 'country')
                ->where('name', $name)
                ->union(DB::table('cities')
                        ->select('name', 'country')
                        ->where('name', $name)
                )
                ->first();
        if (!$city) {
            abort(404); // or redirect to a 404 page
        }
    
        $categories = DB::table('categories')->where('active', 'Y')->orderBy('name')->get();
        $places = DB::table('places')
        ->where('place_active', 'Y')
        ->join('city', 'places.city', '=', 'city.name')
        ->select('places.*')
        ->where('city.name', $name)
        ->union(DB::table('places')
            ->join('cities', 'places.city', '=', 'cities.name')
            ->select('places.*')
            ->where('cities.name', $name)
        )
        ->get();
    
    foreach ($places as $place) {
        // Get the image paths for the place
        $bgImagePath = Storage::url($place->bg_image);
        $iconPath = Storage::url($place->icon);
    
        // Add the image paths to the place object
        $place->bg_image_path = $bgImagePath;
        $place->icon_path = $iconPath;
    }
    
// Show the $places data here

$cards = DB::table('cards')->get();

    
        return view('city', compact('city', 'categories', 'places','cards'));
    }
    

    public function otherCities()
{
    $othercities = DB::table('cities')->orderBy('name')->paginate(20);

    return view('othercities', compact('othercities'));
}


public function searchCities(Request $request)
{
    $query = $request->input('query');

    $cities = DB::table('city')
    ->select('name', 'country')
    ->where('name', 'like', '%' . $query . '%')
    ->where('active', 'Y')
    ->union(
        DB::table('cities')
        ->select('name', 'country')
        ->where('name', 'like', '%' . $query . '%')
        ->where('active', 'Y')
    )
    ->get();


    return response()->json(['cities' => $cities]);
}




public function citiesedit($id)
{

    try {
        // Get the City by id
        $othercities = DB::table('cities')
            ->where('id', $id)
            ->first();

        // If City not found, redirect back with error
        if (!$othercities) {
            throw new \Exception('City not found!');
        }

        return view('othercitiesedit', [
            'othercities' => $othercities,
            'id' => $id,
        ]);
    } catch (\Exception $e) {
        return redirect()
            ->back()
            ->with('error', $e->getMessage());
    }
}


public function destroyothercity($id)
{
    $city = DB::table('cities')->where('id', $id)->first();

    if ($city) {
        DB::table('cities')->where('id', $id)->delete();
        return back()->with('success', 'City deleted successfully');
    } else {
        return back()->with('error', 'City not found');
    }
}






public function othercitiesupdate(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'active' => 'required|in:Y,N',
        'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $city = DB::table('cities')->where('id', $id)->first();

    if (!$city) {
        abort(404);
    }

    $city_name = $request->input('name');
    $city_country = $request->input('country');
    $city_active = $request->input('active');
    $city_image_path = $city->image_path;

    if ($request->hasFile('image_path')) {
        $image = $request->file('image_path');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $path = 'images/othercities/' . $filename;
        Storage::disk('public')->put($path, file_get_contents($image));
        $city_image_path = $path;
    }




    DB::table('cities')
        ->where('id', $id)
        ->update([
            'name' => $city_name,
            'country' => $city_country,
            'active' => $city_active,
            'image_path' => $city_image_path,
        ]);
    
    return redirect()->route('othercities.edit', ['id' => $id])->with('success', 'City updated successfully');
}







}

