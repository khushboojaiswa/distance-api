<?php

namespace App\Http\Controllers;

use App\Models\Coordinate;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class CoordinateController extends Controller
{
    public function save(Request $request)
    {
        try {
            $data = $request->validate([
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric',
            ]);

            $coordinate = Coordinate::create($data);

            return response()->json($coordinate, 201);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->validator->errors()], 400);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->validate([
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric',
            ]);

            $coordinate = Coordinate::findOrFail($id);
            $coordinate->update($data);

            return response()->json($coordinate, 200);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->validator->errors()], 400);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Coordinate not found.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
    }

    public function softDelete($id)
    {
        try {
            $coordinate = Coordinate::findOrFail($id);
            $coordinate->delete();

            return response()->json(['message' => 'Soft deleted successfully'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Coordinate not found.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
    }

    public function viewAll()
    {
        try {
            $coordinates = Coordinate::all();

            return response()->json($coordinates, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
    }
}
