<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreMediaRequest;
use App\Http\Requests\UpdateMediaRequest;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medias = Media::latest()->get();
        return view('admin.media.index', compact('medias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.media.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMediaRequest $request)
    {
        $filename = uniqid('media_') . '.' . $request->video->getClientOriginalExtension();

        $request->video->storeAs('medias', $filename);

        $media = Media::create([
            'title' => $request->title,
            'path' => 'medias/' . $filename,
        ]);

        return redirect()->route('medias.index')->with('success', 'Media Stored successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Media $media)
    {
        return view('admin.media.edit', compact('media'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Media $media)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'video' => 'nullable',
        ]);

        if ($request->hasFile('video')) {
            Storage::delete($media->path);

            $video = $request->file('video');
            $filename = uniqid('media_') . '.' . $video->getClientOriginalExtension();
            $video->storeAs('medias', $filename);

            $media->update([
                'title' => $request->title,
                'path' => 'medias/' . $filename,
            ]);
        } else {
            $media->update([
                'title' => $request->title,
            ]);
        }

        return redirect()->route('medias.index')->with('success', 'Media updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Media $media)
    {
        try {
            $filePath = $media->path;

            Storage::delete($filePath);

            $media->delete();

            return redirect()->route('medias.index')->with('success', 'Media deleted successfully.');
        } catch (\Exception $e) {
            \Log::error('Error deleting media file: ' . $e->getMessage());

            return redirect()->route('medias.index')->with('error', 'Failed to delete media.');
        }
    }
}
