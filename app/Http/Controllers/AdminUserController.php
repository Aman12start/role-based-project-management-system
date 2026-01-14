<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\UserCreatedMail;
use Illuminate\Support\Facades\Mail;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get only normal users (not admin)
        $users = User::where('role', 'user')->latest()->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Server-side validation
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Create new user
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password), // secure hashing
            'role'     => 'user',
            // 'role'     => $request->role,
        ]);

        //send email after user created successfully

        Mail::to($user->email)->send(
            new UserCreatedMail($user, $request->password)
        );

        // Flash message + redirect
        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     * (Not required – we will not use this)
     */
    public function show(string $id)
    {
        // Not used
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        // Validation
        $request->validate([
            'name'  => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        // Update user data
        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        // Flash message
        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User deleted successfully');
    }
}
