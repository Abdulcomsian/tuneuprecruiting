<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreMediaRequest;
use App\Http\Requests\UpdateMediaRequest;
use Illuminate\Support\Facades\File;


class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $medias = Media::latest()->orderBy('id', 'asc')->get();
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
        // Generate a unique filename
        $filename = uniqid('media_') . '.' . $request->video->getClientOriginalExtension();
        $documentname = uniqid('document_') . '.' . $request->document->getClientOriginalExtension();

        // Define the path to the public/medias directory
        $destinationPath = public_path('medias');
        $destinationPath_document = public_path('document');

        // Check if the directory exists, if not, create it
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }
        if (!File::exists($destinationPath_document)) {
            File::makeDirectory($destinationPath_document, 0755, true);
        }
        // Move the uploaded file to the public/medias directory
        $request->video->move($destinationPath, $filename);
        $request->document->move($destinationPath_document, $documentname);
        // Save the media information to the database
        $media = Media::create([
            'title' => $request->title,
            'path' => 'medias/' . $filename, // Relative path to the file in the public directory
            'document' => 'document/' . $documentname, // Relative path to the file in the public directory
        ]);

        // Redirect to the medias index with a success message
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
            // Storage::delete($media->path);

            // $video = $request->file('video');
            // $filename = uniqid('media_') . '.' . $video->getClientOriginalExtension();
            // $video->storeAs('medias', $filename);
            $destinationPath = public_path('medias');
            $filename = uniqid('media_') . '.' . $request->video->getClientOriginalExtension();
            $request->video->move($destinationPath, $filename);
            $media->update([
                'title' => $request->title,
                'path' => 'medias/' . $filename,
            ]);
        }
        if ($request->hasFile('document')) {
            $destinationPath_document = public_path('document');
            $documentname = uniqid('document_') . '.' . $request->document->getClientOriginalExtension();

            $request->document->move($destinationPath_document, $documentname);
            

            $media->update([
                'title' => $request->title,
                'document' => 'document/' . $documentname,
            ]);
        }
        $media->update([
            'title' => $request->title,
        ]);

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
