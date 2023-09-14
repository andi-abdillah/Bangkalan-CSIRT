<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\ImageProperty;
use App\Models\Regulation;
use App\Models\RegulationCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreRegulationCategoryRequest;
use App\Http\Requests\UpdateRegulationCategoryRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;

class RegulationCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.regulationCategories.index', [
            'profils' => Profil::latest()->get(),
            'regulationCategories' => RegulationCategory::all(),
            'properties' => ImageProperty::where('property', 'Logo')
                ->latest()
                ->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.regulationCategories.create', [
            'profils' => Profil::latest()->get(),
            'properties' => ImageProperty::where('property', 'Logo')
                ->latest()
                ->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRegulationCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegulationCategoryRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:regulation_categories,name',
            'slug' => 'required|unique:regulation_categories,slug',
        ]);

        $validatedData['name'] = strip_tags($validatedData['name']);

        RegulationCategory::create($validatedData);

        return redirect('/dashboard/regulation-categories')->with('success', 'New Regulation Category has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegulationCategory  $regulationCategory
     * @return \Illuminate\Http\Response
     */
    public function show(RegulationCategory $regulationCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegulationCategory  $regulationCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(RegulationCategory $regulationCategory)
    {
        return view('dashboard.regulationCategories.edit', [
            'profils' => Profil::latest()->get(),
            'regulationCategory' => $regulationCategory,
            'properties' => ImageProperty::where('property', 'Logo')
                ->latest()
                ->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRegulationCategoryRequest  $request
     * @param  \App\Models\RegulationCategory  $regulationCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRegulationCategoryRequest $request, RegulationCategory $regulationCategory)
    {
        $rules = [
            'name' => 'required|max:255',
        ];

        if ($request->slug != $regulationCategory->slug) {
            $rules['slug'] = 'required|unique:regulation_categories,slug';
        }

        $validatedData = $request->validate($rules);

        $validatedData['name'] = strip_tags($validatedData['name']);

        RegulationCategory::where('id', $regulationCategory->id)->update($validatedData);

        return redirect('/dashboard/regulation-categories')->with('success', 'Regulation Category has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegulationCategory  $regulationCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegulationCategory $regulationCategory)
    {
        $regulations = Regulation::where('regulation_category_id', $regulationCategory->id)->get();

        foreach ($regulations as $regulation) {
            Storage::delete($regulation->path);
            $regulation->delete();
        }

        $regulationCategory->delete();

        return redirect('/dashboard/regulation-categories')->with('success', 'Regulation Category and its ASSOCIATED REGULATIONS have been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(RegulationCategory::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
