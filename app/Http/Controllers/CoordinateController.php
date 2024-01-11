<?php

namespace App\Http\Controllers;

use App\Models\Coordinate;
use Illuminate\Http\Request;

class CoordinateController extends Controller
{
    public function save(Request $request)
    {
        $data = $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $coordinate = Coordinate::create($data);

        return response()->json($coordinate, 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $coordinate = Coordinate::findOrFail($id);
        $coordinate->update($data);

        return response()->json($coordinate, 200);
    }

    public function softDelete($id)
    {
        $coordinate = Coordinate::findOrFail($id);
        $coordinate->delete();

        return response()->json(['message' => 'Soft deleted successfully'], 200);
    }

    public function viewAll()
    {
        $coordinates = Coordinate::all();

        return response()->json($coordinates, 200);
    }
}
