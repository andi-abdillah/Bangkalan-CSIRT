<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\ImageProperty;
use App\Models\Regulation;
use App\Models\RegulationCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreRegulationRequest;
use App\Http\Requests\UpdateRegulationRequest;

class DashboardRegulationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.regulations.index', [
            'profils' => Profil::latest()->get(),
            'regulations' => Regulation::latest()
                ->filter(request(['searchRegulationsBy']))
                ->paginate(7)
                ->withQueryString(),
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
        return view('dashboard.regulations.create', [
            'profils' => Profil::latest()->get(),
            'regulations' => Regulation::all(),
            'regulationCategories' => RegulationCategory::all(),
            'properties' => ImageProperty::where('property', 'Logo')
                ->latest()
                ->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRegulationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegulationRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'regulation_category_id' => 'required',
            'file' => 'required|mimes:pdf|unique:regulations,file_name',
        ]);

        $fileModel = new Regulation();

        if ($request->file()) {
            $fileName = $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads-regulations', $fileName, 'public');
            $fileSlug = Str::slug($request->name, '-');

            $fileModel->name = $request->name;
            $fileModel->regulation_category_id = $request->regulation_category_id;
            $fileModel->file_name = $fileName;
            $fileModel->slug = $fileSlug;
            $fileModel->path = $filePath;
            $fileModel->save();

            return redirect('/dashboard/regulations')->with('success', 'Regulation File Has been uploaded !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Regulation  $regulation
     * @return \Illuminate\Http\Response
     */
    public function show(Regulation $regulation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Regulation  $regulation
     * @return \Illuminate\Http\Response
     */
    public function edit(Regulation $regulation)
    {
        // dd($regulation);
        return view('dashboard.regulations.edit', [
            'profils' => Profil::latest()->get(),
            'regulation' => $regulation,
            'regulationCategories' => RegulationCategory::all(),
            'properties' => ImageProperty::where('property', 'Logo')
                ->latest()
                ->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRegulationRequest  $request
     * @param  \App\Models\Regulation  $regulation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRegulationRequest $request, Regulation $regulation)
    {
        $rules = [
            'name' => 'required|string|max:255',
        ];

        if ($request->name != $regulation->name) {
            $rules['name'] = 'required|string|max:255|unique:regulations,name';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('file')) {
            if ($regulation->path) {
                Storage::delete($regulation->path);
            }
            $validatedData['file_name'] = $request->file->getClientOriginalName();
            $validatedData['path'] = $request->file('file')->storeAs('uploads-regulations', $validatedData['file_name'], 'public');
            $validatedData['slug'] = Str::slug($request->name, '-');
        }

        Regulation::where('id', $regulation->id)->update($validatedData);

        return redirect('/dashboard/regulations')->with('success', 'Regulation has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Regulation  $regulation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Regulation $regulation)
    {
        if ($regulation->path) {
            Storage::delete($regulation->path);
        }

        Regulation::destroy($regulation->id);

        return redirect('/dashboard/regulations')->with('success', 'Regulation has been deleted!');
    }
}
