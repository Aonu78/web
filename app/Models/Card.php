<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table = 'cards';

    protected $fillable = ['name', 'image', 'bank','active'];
    protected $casts = [
        'active' => 'string',
    ];
    
}
