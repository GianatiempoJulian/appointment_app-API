<?php

namespace App\Http\Controllers;

use App\Models\Servicie;
use Illuminate\Http\Request;

class ServicieController extends Controller
{
    public function index() {
        $servicies = Servicie::all();
        return response()->json($servicies);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'duration' => 'required|integer',
            'price' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/'
        ]);
        $servicie = Servicie::create($validated);
        return response()->json(['msg' => 'Servicie created successfully', 'Servicie' => $servicie], 201);
    }

    public function show($id) {
        $servicie = Servicie::find($id);
        if($servicie){
            return response()->json(['Servicie' => $servicie]); 
        }else{
            return response()->json(['msg' => 'Servicie not found'],404); 
        }
    }

    public function update(Request $request, Servicie $servicie) {
        $validated = $request->validate([
            'name' => 'required|string',
            'duration' => 'required|integer',
            'price' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/'
        ]);
        Servicie::find($servicie->id)->update($validated);
        return response()->json(['msg' => 'Servicie updated successfully', 'Servicie' => $servicie], 201);
    }

    public function destroy(Servicie $servicie) {
        $servicie->delete();
        return response()->json(['msg' => 'Servicie deleted successfully'], 204);
    }
}
