<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DogController extends Controller
{
    public function index()
    {
        $dogs = Dog::all(); // ou Dog::where(...)
    
        return view('dogs.index', compact('dogs'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'breed' => 'required|string',
            'gender' => 'required|in:macho,fêmea',
            'age' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $path = $request->file('image')?->store('dogs', 'public');

        $dog = Dog::create([
            'name' => $request->name,
            'breed' => $request->breed,
            'gender' => $request->gender,
            'age' => $request->age,
            'description' => $request->description,
            'image' => $path,
            'user_id' => Auth::id(),
        ]);

        return response()->json($dog, 201);
    }

    public function show($id)
    {
        return Dog::with('user')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $dog = Dog::findOrFail($id);

        if ($dog->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $request->validate([
            'name' => 'sometimes|string',
            'breed' => 'sometimes|string',
            'gender' => 'sometimes|in:macho,fêmea',
            'age' => 'sometimes|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($dog->image) {
                Storage::disk('public')->delete($dog->image);
            }
            $dog->image = $request->file('image')->store('dogs', 'public');
        }

        $dog->fill($request->only('name', 'breed', 'gender', 'age', 'description'));
        $dog->save();

        return response()->json(['message' => 'Dog updated successfully', 'dog' => $dog]);
    }

    public function destroy($id)
    {
        $dog = Dog::findOrFail($id);

        if ($dog->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        if ($dog->image) {
            Storage::disk('public')->delete($dog->image);
        }

        $dog->delete();

        return response()->json(['message' => 'Dog deleted successfully']);
    }
}
