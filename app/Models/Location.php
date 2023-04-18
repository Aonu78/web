<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'branch',
        'icon',
        'bg_image',
        'card_id',
        'category_id',
        'percentage',
        'active',
        'monday_open',
        'monday_close',
        'tuesday_open',
        'tuesday_close',
        'wednesday_open',
        'wednesday_close',
        'thursday_open',
        'thursday_close',
        'friday_open',
        'friday_close',
        'saturday_open',
        'saturday_close',
        'sunday_open',
        'sunday_close',
        'latitude',
        'longitude',
        'number'
    ];

    public function cards()
    {
        return $this->belongsToMany(Card::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
