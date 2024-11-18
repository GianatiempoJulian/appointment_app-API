<?php

namespace App\Http\Controllers;

use App\Models\Servicie;
use App\Http\Requests\Servicie\StoreServicieRequest;
use App\Http\Requests\Servicie\UpdateServicieRequest;

class ServicieController extends Controller
{
    public function index() {
        $servicies = Servicie::with(['typeServicie'])->get();
        return response()->json($servicies);
    }

    public function store(StoreServicieRequest $request) {
        $servicie = Servicie::create($request->validated());
        return response()->json(['msg' => 'Servicie created successfully', 'Servicie' => $servicie], 201);
    }

    public function show($id) {
        $servicie = Servicie::find($id);
        return $servicie ? response()->json(['Servicie' => $servicie]) : response()->json(['msg' => 'Servicie not found'], 404);
    }

    public function update(UpdateServicieRequest $request, Servicie $servicie) {
        Servicie::find($servicie->id)->update($request->validated());
        return response()->json(['msg' => 'Servicie updated successfully', 'Servicie' => $servicie], 201);
    }

    public function destroy(Servicie $servicie) {
        $servicie->delete();
        return response()->json(['msg' => 'Servicie deleted successfully'], 204);
    }
}
