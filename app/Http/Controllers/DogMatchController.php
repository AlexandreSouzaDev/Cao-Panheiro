<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DogMatchController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $userDog = $user->dogs()->first(); // assumindo que cada usuário tem um dog

        if (!$userDog) {
            return response()->json(['error' => 'User does not have a dog'], 404);
        }

        $matches = $userDog->allMatches()->load(['dogOne', 'dogTwo']);

        return response()->json($matches);
    }
}
