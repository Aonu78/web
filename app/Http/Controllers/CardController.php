<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Card;
use Illuminate\Support\Facades\Storage;


class CardController extends Controller
{
    
    public function store(Request $request)
    {
        try {
            // Validate the form data
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'bank' => 'required|max:255',
                
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
    
            

            
            // Convert the active input value to a Y/N string
            $active = $request->input('active') == 'on' ? 'Y' : 'N';

           
    
            // Handle image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $name);
                $validatedData['image'] = $name;
            }
    
            // Create a new card instance and save to the database
            $card = new Card();
            $card->name = $validatedData['name'];
            $card->bank = $validatedData['bank'];
            $card->active = $active;
            $card->save();
            
    
            // Redirect to the card index page with success message
            return redirect()->back()
                ->with('success', 'Card created successfully.');
        } catch (\Exception $e) {
            // Log the error message
            \Log::error($e->getMessage());
            
            // Redirect back to the create form with error message
            return redirect()->back()
                ->withInput()
                ->with('error', 'An error occurred while creating the card. Please try again later.');
        }
    }



    public function edit($id)
{
    // Get the card by id
    $card = Card::findOrFail($id);

    return view('cardedit', compact('card'));
}

    

public function update(Request $request, Card $card)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'active' => 'required|in:Y,N',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $card->name = $request->name;
    $card->bank = $request->bank;
    $card->active = $request->active == 'Y' ? 'Y' : 'N';

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $path = 'images/card/' . $filename;
        Storage::disk('public')->put($path, file_get_contents($image));
        $card->image = $path;
    }

    $card->save();
    return redirect()->route('card.edit', ['card' => $card->id])->with('success', 'Card updated successfully');
}


public function destroy(Card $card)
{
    $card->delete();
    return redirect()->back()->with('success', 'Card deleted successfully!');
   
}


public function index()
{
    $cards = DB::table('cards')->get();
    return view('cards', compact('cards'));
}
    


    
}



