<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Support\Str;
use App\Models\VideoProfile;
use App\Models\ImageProperty;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreVideoProfileRequest;
use App\Http\Requests\UpdateVideoProfileRequest;

class VideoProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.videos.index', [
            'profils' => Profil::latest()->get(),
            'properties' => ImageProperty::latest()->get(),
            'videos' => VideoProfile::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!VideoProfile::count()) {
            return view('dashboard.videos.create', [
                'profils' => Profil::latest()->get(),
                'properties' => ImageProperty::latest()->get(),
            ]);
        }
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVideoProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVideoProfileRequest $request)
    {
        if (!VideoProfile::count()) {
            $validatedData = $request->validate([
                'title' => 'required|max:255|unique:video_profiles',
                'video' => 'required|mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:120000',
            ]);

            if ($request->file('video')) {
                $validatedData['video'] = $request->file('video')->store('video-profile');
            }

            $validatedData['slug'] = Str::slug($validatedData['title'], '-');

            if ($request->has('show')) {
                $validatedData['show'] = true;
            } else {
                $validatedData['show'] = false;
            }

            VideoProfile::create($validatedData);

            return redirect('/dashboard/videos')->with('success', 'New Video has been added!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VideoProfile  $videoProfile
     * @return \Illuminate\Http\Response
     */
    public function show(VideoProfile $videoProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VideoProfile  $videoProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(VideoProfile $video)
    {
        return view('dashboard.videos.edit', [
            'profils' => Profil::latest()->get(),
            'video' => $video,
            'properties' => ImageProperty::where('property', 'Logo')
                ->latest()
                ->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVideoProfileRequest  $request
     * @param  \App\Models\VideoProfile  $videoProfile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVideoProfileRequest $request, VideoProfile $video)
    {
        $rules = [
            'video' => 'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:120000',
        ];

        if ($request->title != $video->title) {
            $rules['title'] = 'required|max:255|unique:video_profiles';
        }

        $validatedData = $request->validate($rules);

        if ($request->has('show')) {
            $validatedData['show'] = true;
        } else {
            $validatedData['show'] = false;
        }

        if ($request->file('video')) {
            if ($video->video) {
                Storage::delete($video->video);
            }
            $validatedData['video'] = $request->file('video')->store('video-profile');
        }

        $validatedData['slug'] = Str::slug($request->title, '-');

        VideoProfile::where('id', $video->id)->update($validatedData);

        return redirect('/dashboard/videos')->with('success', 'Video has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VideoProfile  $videoProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(VideoProfile $video)
    {
        if ($video->video) {
            Storage::delete($video->video);
        }

        VideoProfile::destroy($video->id);

        return redirect('/dashboard/videos')->with('success', 'Video has been deleted!');
    }
}
