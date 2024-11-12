<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::create([
            'name' => 'Dashboard',
            'route' => 'dashboard',
            'icon' => 'fas fa-tachometer-alt',
            'sort' => 1,
        ]);
        Menu::create([
            'name' => 'Users',
            'route' => 'users',
            'icon' => 'far fa-user',
            'sort' => 2,
        ]);
        Menu::create([
            'name' => 'Theme Settings',
            'route' => 'theme',
            'icon' => 'far fa-image',
            'sort' => 3,
        ]);
    }
}
