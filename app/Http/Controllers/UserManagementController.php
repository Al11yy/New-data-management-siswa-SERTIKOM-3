<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name')->get();
        return view('user_management.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('user_management.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'photo' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($user->photo && Storage::disk('public')->exists($user->photo)) {
                Storage::disk('public')->delete($user->photo);
            }

            $path = $request->photo->store('users', 'public');
            $user->photo = $path;
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('user_management.index')
            ->with('success', 'User berhasil diperbarui.');
    }
}
