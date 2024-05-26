<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the news.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new news.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created news in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreUserRequest $request)
    {
        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Assign role to the user
        $user->assignRole($request->role);

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    /**
     * Show the form for editing the specified news.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\View\View
     */

    public function edit($id)
    {
        // Get all roles
        $roles = Role::all();
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        // Update user details
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        // Sync user role
        $user->syncRoles([$request->role]);

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }


    /**
     * Remove the specified news from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully.');
    }
}