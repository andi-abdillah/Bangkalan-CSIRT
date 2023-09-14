<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Footer;
use App\Models\Profil;
use App\Models\RegulationCategory;
use App\Models\Regulation;
use App\Models\ImageProperty;
use App\Models\Key;

class RegulationController extends Controller
{
    public function index()
    {
        $title = '';
        $selectedCategory = '';

        if (request('regulationCategory')) {
            $regulationCategory = RegulationCategory::firstWhere('slug', request('regulationCategory'));
            if (!$regulationCategory) {
                return abort(404);
            }
            $title = ' di ' . $regulationCategory->name;
            $selectedCategory = $regulationCategory->name;
        }

        return view('regulations', [
            'title' => 'Seluruh Peraturan Kebijakan' . $title,
            'selectedCategory' => $selectedCategory,
            'includeHero' => false,
            'includeVideo' => false,
            'footers' => Footer::latest()->get(),
            'profils' => Profil::latest()->get(),
            'keys' => Key::latest()->get(),
            'regulationCategories' => RegulationCategory::all(),
            'regulations' => Regulation::latest()
                ->filter(request(['search', 'regulationCategory']))
                ->paginate(7)
                ->withQueryString(),
            'propertiez' => ImageProperty::where('property', 'Banner')
                ->latest()
                ->get(),
            'properties' => ImageProperty::where('property', 'Logo')
                ->latest()
                ->get(),
            'posts' => Post::where('published', true)
                ->latest()
                ->get(),
        ]);
    }
}
