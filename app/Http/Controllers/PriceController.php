<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
     public function getPricesData()
     {
         $prices = Price::all();
         return response()->json($prices);
     }

     public function index(){
         $prices = Price::all();
         return view('admin.pricing.index', compact('prices'));
     }
     public function create()
     {
        return view('admin.pricing.create');
     }
     public function store(Request $request){
          $request->validate([
              'name' => 'required|string|max:255',
              'price' => 'required|numeric|min:0',
          ]);
          Price::create($request->all());

          return redirect()->route('admin.pricing.index')->with('success', 'Price added successfully');
     }
     public function edit($id){
         $price = Price::findOrFail($id);
         return view('admin.pricing.edit', compact('price'));
     }
     public function update(Request $request, $id){
         $price = Price::findOrFail($id);
          $request->validate([
              'name' => 'required|string|max:255',
              'price' => 'required|numeric|min:0',
          ]);
          $price->update($request->all());
          return redirect()->route('admin.pricing.index')->with('success', 'Price updated successfully');
     }
     public function destroy($id){
         $price = Price::findOrFail($id);
         $price->delete();
         return redirect()->route('admin.pricing.index')->with('success', 'Price deleted successfully');
     }
}
