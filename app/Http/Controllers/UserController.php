<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileSetCountryRequest;
use App\Models\Country;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users', compact('users'));
    }

    public function profile(User $user)
    {
        return view('profile', [
            'user' => $user->load('countries'),
            'countries' => Country::all()
        ]);
    }

    public function setCountries(User $user, ProfileSetCountryRequest $request)
    {
        $user->setCountries($request->validated());
        return redirect()
            ->route('profiles.show', $user->id)
            ->with(['success' => 'Countries updated successfully']);
    }
}
