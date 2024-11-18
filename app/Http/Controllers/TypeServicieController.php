<?php

namespace App\Http\Controllers;

use App\Models\TypeServicie;
use App\Http\Requests\TypeServicie\StoreTypeServicieRequest;

class TypeServicieController extends Controller
{
    public function index() {
        $typesServicie = TypeServicie::all();
        return response()->json($typesServicie);
    }

    public function store(StoreTypeServicieRequest $request) {
        $typeServicie = TypeServicie::create($request->validated());
        return response()->json(['msg' => 'Type servicie created successfully', 'Type Servicie' => $typeServicie], 201);
    }

    public function show($id) {
        $typeServicie = TypeServicie::find($id);
        return $typeServicie ? response()->json(['Type Servicie' => $typeServicie]) : response()->json(['msg' => 'Type Servicie not found'], 404);
    }

    public function update(StoreTypeServicieRequest $request, TypeServicie $typeServicie) {
        TypeServicie::find($typeServicie->id)->update($request->validated());
        return response()->json(['msg' => 'Type servicie updated successfully', 'Type Servicie' => $typeServicie], 201);
    }

    public function destroy(TypeServicie $typeServicie) {
        $typeServicie->delete();
        return response()->json(['msg' => 'Type servicie deleted successfully'], 204);
    }
}
