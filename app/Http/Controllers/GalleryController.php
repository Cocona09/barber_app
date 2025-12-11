<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    private function uploadImage($file, $folder)
    {
        $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($folder), $filename);
        return $folder . '/' . $filename;
    }

    private function deleteImage($path)
    {
        if ($path && file_exists(public_path($path))) {
            unlink(public_path($path));
        }
    }
    public function getGalleriesData()
    {
        $galleries = Gallery::all();
        return response()->json($galleries);
    }

    public function index()
    {
        $galleries = Gallery::all();
        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'         => 'required|string|max:255',
            'before_image'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'after_image'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $validated['before_image'] = $this->uploadImage($request->file('before_image'), 'uploads/galleries');
        $validated['after_image']  = $this->uploadImage($request->file('after_image'), 'uploads/galleries');

        Gallery::create($validated);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery added successfully!');
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $validated = $request->validate([
            'title'         => 'required|string|max:255',
            'before_image'  => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'after_image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data['title'] = $validated['title'];

        if ($request->hasFile('before_image')) {
            $this->deleteImage($gallery->before_image);
            $data['before_image'] = $this->uploadImage($request->file('before_image'), '/uploads/galleries');
        }

        if ($request->hasFile('after_image')) {
            $this->deleteImage($gallery->after_image);
            $data['after_image'] = $this->uploadImage($request->file('after_image'), '/uploads/galleries');
        }
        $gallery->update($data);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery updated successfully!');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        $this->deleteImage($gallery->before_image);
        $this->deleteImage($gallery->after_image);

        $gallery->delete();

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery deleted successfully!');
    }
}
