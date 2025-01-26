<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.users.index', [
            'users' => $users
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
            //
    }

    /**
     * Show the form for editing the specified resource.
     */

    
    public function edit(string $id)
    {
        $roles = Role::all();
        $user = User::findOrFail($id); // قم بتغيير $users إلى $user لأنه مستخدم واحد
        return view('admin.users.edit', [
            'user' => $user,  // استخدام $user بدلاً من $users
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $users = User::findOrFail($id);
        $request ->validate([
            'role_id' => 'required|exists:roles,id',
            ]);
            $users->update([
                'role_id' => $request->input('role_id')
            ]);
            return redirect()->to('dashboard/users')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
