<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use App\Http\Requests\Speciality\StoreSpecialityRequest;

class SpecialityController extends Controller
{
    public function index() {
        $specialities = Speciality::all();
        return response()->json($specialities);
    }

    public function store(StoreSpecialityRequest $request) {
        $speciality = Speciality::create($request->validated());
        return response()->json(['msg' => 'Speciality created successfully', 'Speciality' => $speciality], 201);
    }

    public function show($id) {
        $speciality = Speciality::find($id);
        return $speciality ? response()->json(['Speciality' => $speciality]) : response()->json(['msg' => 'Speciality not found'], 404);
    }

    public function update(StoreSpecialityRequest $request, Speciality $speciality) {
        Speciality::find($speciality->id)->update($request->validated());
        return response()->json(['msg' => 'Speciality updated successfully', 'Speciality' => $speciality], 201);
    }

    public function destroy(Speciality $speciality) {
        $speciality->delete();
        return response()->json(['msg' => 'Speciality deleted successfully'], 204);
    }
}
