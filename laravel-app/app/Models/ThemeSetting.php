<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThemeSetting extends Model
{
    protected $fillable = ['background', 'logo', 'menu_order', 'menu_icons'];
    protected $casts = [
        'menu_order' => 'array',
        'menu_icons' => 'array',
    ];
}
