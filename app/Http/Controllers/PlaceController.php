<?php

namespace App\Http\Controllers;
use App\Models\Place;
use App\Http\Requests\Place\StorePlaceRequest;

class PlaceController extends Controller
{

    public function index() {
        $places = Place::all();
        return response()->json($places);
    }

    public function store(StorePlaceRequest $request) {
        $place = Place::create($request->validated());
        return response()->json(['msg' => 'Place created successfully', 'Place' => $place], 201);
    }

    public function show($id) {
        $place = Place::find($id);
        return $place ? response()->json(['Place' => $place]) : response()->json(['msg' => 'Place not found'], 404);
    }

    public function update(StorePlaceRequest $request, Place $place) {
        Place::find($place->id)->update($request->validated());
        return response()->json(['msg' => 'Place updated successfully', 'Place' => $place], 201);
    }

    public function destroy(Place $place) {
        $place->delete();
        return response()->json(['msg' => 'Place deleted successfully'], 204);
    }
}
