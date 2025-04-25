<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Dog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    public function register(Request $request)
{
    $request->validate([
        'owner_name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'photo' => 'nullable|image|max:2048',
        'dog_name' => 'required|string|max:255',
        'age' => 'required|integer|min:0',
        'breed' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|max:2048',
    ]);    

    // Criação do usuário
    $data = [
        'name' => $request->owner_name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ];
    
    if ($request->hasFile('photo')) {
        $data['photo'] = $request->file('photo')->store('users', 'public');
    }
    
    $user = User::create($data);
    
    // Criação do cachorro vinculado
    $dogData = [
        'user_id' => $user->id,
        'name' => $request->dog_name,
        'age' => $request->age,
        'breed' => $request->breed,
        'description' => $request->description,
    ];    

    if ($request->hasFile('image')) {
        ($request->file('image')); // teste
        $path = $request->file('image')->store('dogs', 'public');
        $dogData['image'] = $path; // Ex: 'dogs/abc123.png'
        
    }

    Dog::create($dogData);

    // Login automático
    Auth::login($user);

    $dogs = Dog::latest()->get(); // ou ->paginate(9);

    return redirect()->route('dogs.index');
}


    
}