<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use Illuminate\Http\Request;

class BarberController extends Controller
{
    public function getBarbersData()
    {
        $barbers = Barber::all();
        return response()->json($barbers);
    }
    public function index(){
        $barbers = Barber::all();
        return view('admin.barber.index', compact('barbers'));
    }
    public function create(){
        return view('admin.barber.create');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'specialties' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/barbers/', $filename);
            $validatedData['image'] = 'uploads/barbers/' .$filename;
        }
        else{
            $validatedData['image'] = null;
        }
        Barber::create([
            'name' => $validatedData['name'],
            'specialties' => $validatedData['specialties'],
            'image' => $validatedData['image'],
        ]);
        return redirect()->route('admin.barber.index')->with('success', 'Barber added successfully');
    }
    public function edit($id){
         $barber = Barber::findOrFail($id);
         return view('admin.barber.edit', compact('barber'));
    }
    public function update(Request $request, $id){
         $barber = Barber::findOrFail($id);

         $request->validate([
             'name' => 'required|string',
             'specialties' => 'required|string',
             'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
         ]);

         $data = $request->only(['name', 'specialties']);

        if ($request->hasFile('image')) {
            if ($barber->image && file_exists(public_path($barber->image))) {
                unlink(public_path($barber->image));
            }
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/barbers/'), $imageName);
            $data['image'] = 'uploads/barbers/' . $imageName;
        }

         $barber->update($data);

         return redirect()->route('admin.barber.index')->with('success', 'Barber updated successfully');
    }
    public function destroy($id){
         $barber =  Barber::findOrFail($id);
         if ($barber->image && file_exists(public_path($barber->image))) {
            unlink(public_path($barber->image));
         }
         $barber->delete();
         return redirect()->route('admin.barber.index')->with('success', 'Barber deleted successfully');
    }
}
