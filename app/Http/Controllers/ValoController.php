<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Models\Valo;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class ValoController extends Controller
{
    public function valo(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);

        $icon = base64_encode(
            file_get_contents($request->file('icon')->getPathname())
        );
        $bgimage = base64_encode(
            file_get_contents($request->file('bgimage')->getPathname())
        );
        $city = explode('|', $request->input('city'));
        $data = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'branch' => $request->input('branch'),
            // 'city_id' => $request->input('city_id'),
            'card_id' => $request->input('card_id'),
            'percentage' => $request->input('percentage'),
            'category_id' => $request->input('category_id'),
            // 'icon' => $icon,
            // 'bg_image' => $bgimage,
            'number' => $request->input('number'),
            'address' => $request->input('address'),
            'monday_open' => $request->input('monday_open'),
            'monday_close' => $request->input('monday_close'),
            'tuesday_open' => $request->input('tuesday_open'),
            'tuesday_close' => $request->input('tuesday_close'),
            'wednesday_open' => $request->input('wednesday_open'),
            'wednesday_close' => $request->input('wednesday_close'),
            'thursday_open' => $request->input('thursday_open'),
            'thursday_close' => $request->input('thursday_close'),
            'friday_open' => $request->input('friday_open'),
            'friday_close' => $request->input('friday_close'),
            'saturday_open' => $request->input('saturday_open'),
            'saturday_close' => $request->input('saturday_close'),
            'sunday_open' => $request->input('sunday_open'),
            'sunday_close' => $request->input('sunday_close'),
            'active' => $request->input('active') == 'on' ? 'Y' : 'N',
            'terms_and_conditions' => $request->input('terms_and_conditions'),
            'icon' => $request->file('icon')->store('public/images'),
            'bg_image' => $request->file('bgimage')->store('public/images'),
            'city_id' => $city[0], // the id of the selected city
            'city' => $city[1], // the name of the selected city
        ];

        DB::beginTransaction();

        try {
            $place_id = DB::table('places')->insertGetId($data);

            $places_master_data = [
                'name' => $data['name'],
                'branch' => $data['branch'],
                'card_id' => $data['card_id'],
                'percentage' => $data['percentage'],
                'category_id' => $data['category_id'],
                'terms_and_conditions' => $data['terms_and_conditions'],
                'active' => $data['active'],
                'city' => $data['city'],
                // add any other fields for the second table
            ];
            DB::table('placemaster')->insert($places_master_data);

            DB::commit();
            return redirect()
                ->back()
                ->with('success', 'Place has been added successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()
                ->back()
                ->with(
                    'error',
                    'Error occurred while adding place: ' . $th->getMessage()
                );
        }
    }

    public function show($place)
    {
        // Get the place by id
        $places = DB::table('places')
            ->where('id', $place)
            ->first();

        // If place not found, redirect back with error
        if (!$places) {
            return redirect()
                ->back()
                ->with('error', 'Place not found!');
        }

        // Pass place data to the view
        return view('places.show', ['places' => $places]);
    }

    public function edit($id)
    {
        try {
            // Get the Place by id
            $places = DB::table('places')
                ->where('id', $id)
                ->first();

            // If Place not found, redirect back with error
            if (!$places) {
                throw new \Exception('Place not found!');
            }

            // Get the old city value from the places table
            $oldCity = $places->city;

            // Query the cities table to get the list of cities
            $cities = DB::table('cities')
                ->orderBy('name', 'asc')
                ->pluck('name', 'id');

            // Query the city table to get the list of cities and merge it with the cities list
            $cities = $cities->merge(
                DB::table('city')
                    ->orderBy('name', 'asc')
                    ->pluck('name', 'id')
            );

            $cards = DB::table('cards')
                ->where('active', '=', 'Y')
                ->pluck('name', 'id');
            $Category = DB::table('categories')
                ->where('active', '=', 'Y')
                ->pluck('name', 'id');

            // Prepare the old data array
            $oldData = [];
            foreach (
                [
                    'monday',
                    'tuesday',
                    'wednesday',
                    'thursday',
                    'friday',
                    'saturday',
                    'sunday',
                ]
                as $day
            ) {
                $oldData[$day . '_open'] = $places->{$day . '_open'};
                $oldData[$day . '_close'] = $places->{$day . '_close'};
            }

            return view('editplaces', [
                'places' => $places,
                'cities' => $cities,
                'cards' => $cards,
                'Category' => $Category,
                'oldData' => $oldData,
                'oldCity' => $oldCity,
                'id' => $id,
            ]);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }

    public function destroy($place)
    {
        $places->delete();

        return redirect()
            ->route('places.index')
            ->with('success', 'Place deleted successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'city' => ['required'],
            'icon' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'bgimage' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);


        $city = explode('|', $request->input('city'));

        $data = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'branch' => $request->input('branch'),
            'card_id' => $request->input('card_id'),
            'percentage' => $request->input('percentage'),
            'category_id' => $request->input('category_id'),
            'number' => $request->input('number'),
            'address' => $request->input('address'),
            'monday_open' => $request->input('monday_open'),
            'monday_close' => $request->input('monday_close'),
            'tuesday_open' => $request->input('tuesday_open'),
            'tuesday_close' => $request->input('tuesday_close'),
            'wednesday_open' => $request->input('wednesday_open'),
            'wednesday_close' => $request->input('wednesday_close'),
            'thursday_open' => $request->input('thursday_open'),
            'thursday_close' => $request->input('thursday_close'),
            'friday_open' => $request->input('friday_open'),
            'friday_close' => $request->input('friday_close'),
            'saturday_open' => $request->input('saturday_open'),
            'saturday_close' => $request->input('saturday_close'),
            'sunday_open' => $request->input('sunday_open'),
            'sunday_close' => $request->input('sunday_close'),
            'place_active' => $request->input('place_active') == 'Y' ? 'Y' : 'N',
            'active' => $request->input('active') == 'on' ? 'Y' : 'N',
            'terms_and_conditions' => $request->input('terms_and_conditions'),
            'city_id' => $city[0], // the id of the selected city
            'city' => $city[1], // the name of the selected city
        
        ];
                // check if a new logo was uploaded
                if ($request->hasFile('icon')) {
                    $data['icon'] = $request->file('icon')->store('public/images');
                }
                
                if ($request->hasFile('bgimage')) {
                    $data['bg_image'] = $request->file('bgimage')->store('public/images');
                }
        

        DB::beginTransaction();

        try {
       

            DB::table('places')
                ->where('id', $id)
                ->update($data);

                $places_master_data = [
                    'name' => $data['name'],
                    'branch' => $data['branch'],
                    'card_id' => $data['card_id'],
                    'percentage' => $data['percentage'],
                    'category_id' => $data['category_id'],
                    'terms_and_conditions' => $data['terms_and_conditions'],
                    'active' => $data['active'],
                    'city' => $data['city'],
                    // add any other fields for the second table
                ];
                

                
                DB::table('placemaster')
                    ->where('id', $id)
                    ->update($places_master_data);
                

            DB::commit();
            return redirect()
                ->back()
                ->with('success', 'Place has been updated successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()
                ->back()
                ->with('error', $th->getMessage());
        }
    }


    public function detail($city, $id)
    {
        $place = DB::table('places')->where('id', $id)->first();
    
        // Check if the background image is stored in the public directory
        $publicBgImagePath = public_path($place->bg_image);
        if (File::exists($publicBgImagePath)) {
            // Get the base64 encoded background image data
            $bgImageData = base64_encode(file_get_contents($publicBgImagePath));
        } else {
            // Check if the background image is stored in the storage directory
            $storageBgImagePath = Storage::disk('local')->path($place->bg_image);
            if (File::exists($storageBgImagePath)) {
                // Get the base64 encoded background image data
                $bgImageData = base64_encode(file_get_contents($storageBgImagePath));
            } else {
                // Handle the case when the background image file does not exist
                return view('detail', ['place' => $place, 'city' => $city]);
            }
        }
    
        // Check if the icon image is stored in the public directory
        $publicIconImagePath = public_path($place->icon);
        if (File::exists($publicIconImagePath)) {
            // Get the base64 encoded icon image data
            $iconImageData = base64_encode(file_get_contents($publicIconImagePath));
        } else {
            // Check if the icon image is stored in the storage directory
            $storageIconImagePath = Storage::disk('local')->path($place->icon);
            if (File::exists($storageIconImagePath)) {
                // Get the base64 encoded icon image data
                $iconImageData = base64_encode(file_get_contents($storageIconImagePath));
            } else {
                // Handle the case when the icon image file does not exist
                return view('detail', ['place' => $place, 'city' => $city]);
            }
        }
    
        // Pass the image data to the view
        return view('detail', ['place' => $place, 'city' => $city, 'bgImageData' => $bgImageData, 'iconImageData' => $iconImageData]);
    }
    

}
