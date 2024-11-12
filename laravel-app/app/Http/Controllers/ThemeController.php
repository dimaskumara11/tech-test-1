<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\ThemeSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ThemeController extends Controller
{
    public function index()
    {
        $theme = ThemeSetting::first();
        $menus = Menu::all();
        return view('theme.index', compact('theme', 'menus'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'background' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'menu_order' => 'required|array',
            'menu_icons' => 'required|array',
        ]);

        $theme = ThemeSetting::first() ?? new ThemeSetting;

        if ($request->hasFile('background')) {
            $backgroundPath = $request->file('background')->store('public/theme');
            $theme->background = Storage::url($backgroundPath);
        }

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('public/theme');
            $theme->logo = Storage::url($logoPath);
        }
        
        $theme->save();


        foreach ($request->menu_order as $key => $value) {
            $menu = Menu::find($key);
            if(!empty($menu)){
                $menu->sort = $value;
                $menu->save();
            }
        }
        
        foreach ($request->menu_icons as $key => $value) {
            $menu = Menu::find($key);
            if(!empty($menu)){
                $menu->icon = $value;
                $menu->save();
            }
        }

        return redirect()->route('theme.index')->with('success', 'Theme updated successfully.');
    }
}
