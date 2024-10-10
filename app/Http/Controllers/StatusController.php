<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index() {
        $status = Status::all();
        return response()->json($status);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'description' => 'required|string'
        ]);
        $status = Status::create($validated);
        return response()->json(['msg' => 'Status created successfully', 'Status' => $status], 201);
    }

    public function show($id) {
        $status = Status::find($id);
        if($status){
            return response()->json(['Status' => $status]); 
        }else{
            return response()->json(['msg' => 'Status not found'],404); 
        }
    }

    public function update(Request $request, Status $status) {
        $validated = $request->validate([
            'description' => 'required|string'
        ]);
        Status::find($status->id)->update($validated);
        return response()->json(['msg' => 'Status updated successfully', 'Status' => $status], 201);
    }

    public function destroy(Status $status) {
        $status->delete();
        return response()->json(['msg' => 'Status deleted successfully'], 204);
    }
}
