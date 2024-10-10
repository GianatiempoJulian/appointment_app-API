<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index() {
        $places = Place::all();
        return response()->json($places);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string'
        ]);
        $place = Place::create($validated);
        return response()->json(['msg' => 'Place created successfully', 'Place' => $place], 201);
    }

    public function show($id) {
        $place = Place::find($id);
        if($place){
            return response()->json(['Place' => $place]); 
        }else{
            return response()->json(['msg' => 'Place not found'],404); 
        }
    }

    public function update(Request $request, Place $place) {
        $validated = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string'
        ]);
        Place::find($place->id)->update($validated);
        return response()->json(['msg' => 'Place updated successfully', 'Place' => $place], 201);
    }

    public function destroy(Place $place) {
        $place->delete();
        return response()->json(['msg' => 'Place deleted successfully'], 204);
    }
}
