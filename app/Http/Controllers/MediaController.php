<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Media;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreMediaRequest;
use App\Http\Requests\UpdateMediaRequest;
use App\Models\MediaImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;


class MediaController extends Controller
{
    public function index()
    {
        $medias = Media::get();
        return view('admin.media.index', compact('medias'));
    }

    public function create()
    {
        return view('admin.media.create');
    }

    public function store(StoreMediaRequest $request)
    {
        $filename = uniqid('media_') . '.' . $request->video->getClientOriginalExtension();

        $destinationPath = public_path('medias');
        $destinationPath_document = public_path('documents');

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }
        if (!File::exists($destinationPath_document)) {
            File::makeDirectory($destinationPath_document, 0755, true);
        }
        $request->video->move($destinationPath, $filename);

        Media::create([
            'title' => $request->title,
            'description' => $request->description,
            'path' => 'medias/' . $filename,
        ]);

        return redirect()->route('medias.index')->with('success', 'Media Stored successfully.');
    }


    public function show(Media $media)
    {
        return view('admin.media.edit', compact('media'));
    }

    public function update(UpdateMediaRequest $request, Media $media)
    {
        if ($request->hasFile('video')) {
            // Storage::delete($media->path);
            // $video = $request->file('video');
            // $filename = uniqid('media_') . '.' . $video->getClientOriginalExtension();
            // $video->storeAs('medias', $filename);

            if ($media->path) {
                $oldImagePath = public_path($media->path);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            $destinationPath = public_path('medias');
            $filename = uniqid('media_') . '.' . $request->video->getClientOriginalExtension();
            $request->video->move($destinationPath, $filename);
            $media->update([
                'title' => $request->title,
                'description' => $request->description,
                'path' => 'medias/' . $filename,
            ]);
        }
        $media->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('medias.index')->with('success', 'Media updated successfully.');
    }

    public function destroy(Media $media)
    {
        try {
            $filePath = public_path($media->path);

            if (File::exists($filePath)) {
                File::delete($filePath);
            }

            $media->delete();

            return redirect()->route('medias.index')->with('success', 'Media deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting media file: ' . $e->getMessage());

            return redirect()->route('medias.index')->with('error', 'Failed to delete media.');
        }
    }

    public function createImages()
    {
        $images = MediaImage::latest()->get();
        return view('admin.media.images.create', compact('images'));
    }

    public function storeImage(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $filename = uniqid('image_') . '.' . $request->image->getClientOriginalExtension();

            $destinationPath = public_path('medias/images');

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $request->image->move($destinationPath, $filename);

            $link = asset('medias/images/' . $filename);

            MediaImage::create([
                'path' => 'medias/images/' . $filename,
                'link' => $link,
            ]);

            return redirect()->back()->with('success', 'Image stored successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to store image: ' . $e->getMessage())->withInput();
        }
    }

    public function Imagedestroy(MediaImage $mediaImage)
    {
        try {
            $filePath = public_path($mediaImage->path);

            if (File::exists($filePath)) {
                File::delete($filePath);
            }

            $mediaImage->delete();

            return redirect()->back()->with('success', 'Image deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting image file: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Failed to delete image.');
        }
    }

    public function imageShow(MediaImage $mediaImage)
    {
        return view('admin.media.images.edit', compact('mediaImage'));
    }

    public function imageUpdate(Request $request, MediaImage $mediaImage)
    {
        try {
            $validator = Validator::make($request->all(), [
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            if ($request->hasFile('image')) {
                if ($mediaImage->path) {
                    $oldImagePath = public_path($mediaImage->path);
                    if (File::exists($oldImagePath)) {
                        File::delete($oldImagePath);
                    }
                }

                $filename = uniqid('image_') . '.' . $request->image->getClientOriginalExtension();

                $destinationPath = public_path('medias/images');

                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true);
                }

                $request->image->move($destinationPath, $filename);
                $link = asset('medias/images/' . $filename);

                $mediaImage->update([
                    'path' => 'medias/images/' . $filename,
                    'link' => $link,
                ]);
            }

            return redirect()->route('medias.images-create')->with('success', 'Image updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating media file: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Failed to update image: ' . $e->getMessage())->withInput();
        }
    }
}
