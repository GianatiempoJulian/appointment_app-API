<?php

namespace App\Http\Controllers;
use App\Models\Status;
use App\Http\Requests\Status\StoreStatusRequest;

class StatusController extends Controller
{
    public function index() {
        $status = Status::all();
        return response()->json($status);
    }

    public function store(StoreStatusRequest $request) {
        $status = Status::create($request->validated());
        return response()->json(['msg' => 'Status created successfully', 'Status' => $status], 201);
    }

    public function show($id) {
        $status = Status::find($id);
        return $status ? response()->json(['Status' => $status]) : response()->json(['msg' => 'Status not found'], 404);
    }

    public function update(StoreStatusRequest $request, Status $status) {
        Status::find($status->id)->update($request->validated());
        return response()->json(['msg' => 'Status updated successfully', 'Status' => $status], 201);
    }

    public function destroy(Status $status) {
        $status->delete();
        return response()->json(['msg' => 'Status deleted successfully'], 204);
    }
}
