<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
    public function index() {
        $specialities = Speciality::all();
        return response()->json($specialities);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string'
        ]);
        $speciality = Speciality::create($validated);
        return response()->json(['msg' => 'Speciality created successfully', 'Speciality' => $speciality], 201);
    }

    public function show($id) {
        $speciality = Speciality::find($id);
        if($speciality){
            return response()->json(['Speciality' => $speciality]); 
        }else{
            return response()->json(['msg' => 'Speciality not found'],404); 
        }
    }

    public function update(Request $request, Speciality $speciality) {
        $validated = $request->validate([
            'name' => 'required|string'
        ]);
        Speciality::find($speciality->id)->update($validated);
        return response()->json(['msg' => 'Speciality updated successfully', 'Speciality' => $speciality], 201);
    }

    public function destroy(Speciality $speciality) {
        $speciality->delete();
        return response()->json(['msg' => 'Speciality deleted successfully'], 204);
    }
}
