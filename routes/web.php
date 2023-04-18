<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\DiscountCardController;
use App\Http\Controllers\ValoController;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // dd('Hello, world!');
    return view('welcome');
});


Route::get('/login', function () {
    return view('login');
});

Route::get('/city', function () {
    return view('city');
});
Route::get('/othercities', [CityController::class, 'index'])->name('city.index');
// Route::get('/city/search', [CityController::class, 'search'])->name('city.search');
Route::get('/othercities/search', [CityController::class,'search'])->name('othercities.search');

Route::get('places/search', function() {
    $searchTerm = request()->get('search');
    $othercities = DB::table('cities')
        ->orderBy('cities.name');
    if(request()->has('search')){
        $othercities = $othercities->where('cities.name','LIKE','%'.$searchTerm.'%');
    }
    $othercities = $othercities->simplePaginate(10);

    return response()->json([
        'cities' => $othercities
    ]);
})->name('places.search');




Route::get('/dashboard', function () {
    $cities = DB::table('cities')->count('name');
    $city = DB::table('city')->count('name');
    $count = \DB::table('cards')->where('active', '=', 'Y')->count('name');
    $categories = DB::table('categories')->where('active', '=', 'Y')->count('name');
    $places = DB::table('places')->where('place_active', '=', 'Y')->count('name');
    return view('dashboard', ['count' => $count,'categories' => $categories,'cities'=> $cities,'city'=> $city,'places'=> $places]);

});

Route::get('/places', function () {
    $cards = DB::table('cards')->where('active', '=', 'Y')->pluck('name', 'id');
    $places = DB::table('places')->pluck('name', 'id','place_active');
    $Category = DB::table('categories')->where('active', '=', 'Y')->pluck('name', 'id');
    $cities = DB::table('city')
        ->select('name')
        ->union(DB::table('cities')->select('name'))
        ->orderBy('name', 'asc')
        ->pluck('name');

    return view('places', compact('cards', 'Category', 'cities','places'));
});




Route::get('/addcontent', function () {
    return view('addcontent');
});

Route::get('/othercities', function () {
    return view('othercities');
});

Route::get('/edit', function () {
    return view('edit');
});


Route::get('/cards', function () {
    return view('cards');
});

// Route::get('/places', function () {
//     return view('places');
// });

Route::get('/cardedit', function () {
    return view('cardedit');
});
// Route::get('/categories', function () {
//     return view('categories');
// });
Route::get('/detail', function () {
    return view('detail');
});

Route::name('login')->get('/login', [LoginController::class, 'index']);




Route::get('login1', [MainController::class,'login']);

Route::get('/logout', function () {
    if (session()->has('user')) {
        session()->pull('user', null);
    }
    return redirect('/');
});

Route::get('/', [CityController::class, 'viewcities'])->name('view-cities');
Route::get('/other-cities', [CityController::class, 'viewothercities'])->name('view-other-cities');

Route::post('/add-city', [CityController::class, 'store'])->name('add.city');
Route::post('/add-other-city', [CityController::class, 'addOthercity'])->name('add.othercity');

// Route::post('/add-city', [CityController::class, 'store'])->name('add.city');

// Route::post('/add-city', [CityController::class, 'addOthercity'])->name('add.othercity');
Route::get('/searchCities', [CityController::class,'searchCities'])->name('searchCities');


Route::get('/city/{name}', [CityController::class, 'show'])->name('city');

// Route::get('/city/{city}', function($city) {
//     $city = urldecode($city);
//     // Do something with the city
// });

Route::get('/city/{city}', function($city) {
    $city = urldecode($city);
    $slug = implode('-', $segments);

// Replace special characters
$slug = str_replace($search, $replace, $slug);

// Replace spaces with hyphens
$slug = str_replace(' ', '-', $slug);

// Remove any double hyphens
$slug = str_replace('--', '-', $slug);

// Remove any hyphens at the beginning or end of the slug
$slug = trim($slug, '-');

return $slug;

})->name('city');


Route::post('/add-category', [CategoryController::class, 'store'])->name('add.category');
Route::get('/categories', function () {
    $categories = DB::table('categories')->get();
    return view('categories', ['categories' => $categories]);
});


Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');


Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::get('/active-categories', [CategoryController::class, 'getActiveCategories'])->name('categories.active');

// Route::post('/cards', [CardController::class, 'addCard'])->name('add.card');
Route::post('/cards', [CardController::class, 'store'])->name('cards.store');
Route::get('/cards/{card}/edit', [CardController::class, 'edit'])->name('cardedit');
Route::put('/cards/{card}', [CardController::class, 'update'])->name('card.update');
Route::delete('/cards/{card}', [CardController::class, 'destroy'])->name('cards.destroy');
Route::get('/cards', [CardController::class, 'index']);
Route::get('/cards', function () {
    $cards = DB::table('cards')->get();
    return view('cards', ['cards' => $cards]);
});

Route::get('/cards/{card}/edit', [CardController::class, 'edit'])->name('card.edit');








Route::post('/places', [ValoController::class, 'valo'])->name('places.store');
Route::get('/places/{id}/edit', [ValoController::class, 'edit'])->name('places.edit');
Route::put('/places/{id}', [ValoController::class, 'update'])->name('places.update');
Route::delete('/places/{id}', [ValoController::class, 'destroy'])->name('places.destroy');


Route::get('/{city}/detail/{id}', [ValoController::class, 'detail'])->name('detail');


// Route::get('/othercities/{id}/edit', [CityController::class, 'citiesedit'])->name('cities.edit');
// Route::delete('/othercities/{id}', [ValoController::class, 'destroyothercity'])->name('cities.destroy');


Route::get('/othercities/{id}/edit', [CityController::class, 'citiesedit'])->name('othercities.edit');
Route::delete('/othercities/{id}', [CityController::class, 'destroyothercity'])->name('othercities.destroy');
Route::put('/othercities/{id}', [CityController::class, 'othercitiesupdate'])->name('othercities.update');


