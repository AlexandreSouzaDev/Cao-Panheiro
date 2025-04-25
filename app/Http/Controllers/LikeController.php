<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use App\Models\Like;
use App\Models\DogMatch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'liked_dog_id' => 'required|exists:dogs,id',
        ]);

        $user = Auth::user();
        $likingDog = $user->dogs()->first();
        $likedDogId = $request->liked_dog_id;

        if (!$likingDog) {
            return response()->json(['error' => 'User does not have a dog'], 404);
        }

        if ($likingDog->id === (int)$likedDogId) {
            return response()->json(['error' => 'A dog cannot like itself'], 400);
        }

        $existingLike = Like::where('dog_one_id', $likingDog->id)
            ->where('dog_two_id', $likedDogId)
            ->first();

        if ($existingLike) {
            return response()->json(['message' => 'Like already exists'], 200);
        }

        Like::create([
            'dog_one_id' => $likingDog->id,
            'dog_two_id' => $likedDogId,
        ]);

        $reciprocalLike = Like::where('dog_one_id', $likedDogId)
            ->where('dog_two_id', $likingDog->id)
            ->first();

        if ($reciprocalLike) {
            $matchExists = DogMatch::where(function ($query) use ($likingDog, $likedDogId) {
                $query->where('dog_one_id', $likingDog->id)->where('dog_two_id', $likedDogId);
            })->orWhere(function ($query) use ($likingDog, $likedDogId) {
                $query->where('dog_one_id', $likedDogId)->where('dog_two_id', $likingDog->id);
            })->exists();

            if (!$matchExists) {
                DogMatch::create([
                    'dog_one_id' => $likingDog->id,
                    'dog_two_id' => $likedDogId,
                ]);
            }

            return response()->json(['message' => 'It\'s a match!'], 201);
        }

        return response()->json(['message' => 'Like registered'], 201);
    }

    public function destroy($id)
    {
        $like = Like::findOrFail($id);
        $user = Auth::user();
        $userDog = $user->dogs()->first();

        if (!$userDog || $like->dog_one_id !== $userDog->id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $like->delete();

        return response()->json(['message' => 'Like removed']);
    }
}
