<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\DiscountCard;

class DiscountCardController extends Controller
{
    public function discountcard(Request $request)
    {
        // Validate form data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'bank' => 'required',
            'active' => 'required|in:Y,N',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Save image file if uploaded
        $imagePath = null;
        if ($request->has('image')) {
            $imagePath = $request->file('image')->store('public/categories');
        }
    
        // Prepare data to insert into database
        $data = [
            'name' => $request->input('name'),
            'bank' => $request->input('bank'),
            'image' => $imagePath,
            'active' => $request->input('active') == 'on' ? 'Y' : 'N',
        ];
    
        // Create table for the cards if it doesn't exist
        DB::statement('CREATE TABLE IF NOT EXISTS discountcards (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            bank VARCHAR(255) NOT NULL,
            image VARCHAR(255) NULL,
            active ENUM("Y", "N") NOT NULL DEFAULT "Y",
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )');
    
        try {
            // Insert data into database
            DB::table('discountcards')->insert($data);
    
            return redirect()->back()->with('success', 'Card added successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Error occurred while adding card: '.$th->getMessage());
        }

        Log::info('Data to be inserted: ' . print_r($data, true));

    }
}
