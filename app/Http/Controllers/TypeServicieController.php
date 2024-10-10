<?php

namespace App\Http\Controllers;

use App\Models\TypeServicie;
use Illuminate\Http\Request;

class TypeServicieController extends Controller
{
    public function index() {
        $typesServicie = TypeServicie::all();
        return response()->json($typesServicie);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string'
        ]);
        $typeServicie = TypeServicie::create($validated);
        return response()->json(['msg' => 'Type servicie created successfully', 'Type Servicie' => $typeServicie], 201);
    }

    public function show($id) {
        $typeServicie = TypeServicie::find($id);
        if($typeServicie){
            return response()->json(['Type Servicie' => $typeServicie]); 
        }else{
            return response()->json(['msg' => 'Type servicie not found'],404); 
        }
    }

    public function update(Request $request, TypeServicie $typeServicie) {
        $validated = $request->validate([
            'name' => 'required|string'
        ]);
        TypeServicie::find($typeServicie->id)->update($validated);
        return response()->json(['msg' => 'Type servicie updated successfully', 'Type Servicie' => $typeServicie], 201);
    }

    public function destroy(TypeServicie $typeServicie) {
        $typeServicie->delete();
        return response()->json(['msg' => 'Type servicie deleted successfully'], 204);
    }
}
