<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::orderBy('created_at', 'DESC')->get();
        return view('admin.user.list')->with('user', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|string',
            'email' => 'required|email',
            'password' => 'required',
            'status' => 'required|in:active,inactive',
            'role' => 'required|in:admin,blogger'
        ]);

        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->status = $request->get('status');
        $user->role = $request->get('role');
        $status = $user->save();
        if ($status == true) {
            return redirect()->route('user.index')->with('success', 'User added successfully');
        } else {
            return redirect()->route('user.index')->with('error', 'Error occured while adding the user');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:3|string',
            'email' => 'required|email',
            'status' => 'required|in:active,inactive',
            'role' => 'required|in:admin,blogger'
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->status = $request->get('status');
        $user->role = $request->get('role');
        $status = $user->save();
        if ($status == true) {
            return redirect()->route('user.index')->with('success', 'User updated successfully');
        } else {
            return redirect()->route('user.index')->with('error', 'Error occured while updating the user');
        }
    }

    public function openPasswordForm($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.changepassword')->with('user', $user);
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'npassword' => 'required'
        ]);

        $id = $request->get('id');
        $user = User::findOrFail($id);
        $encrypted = bcrypt($request->get('npassword'));
        $user->password = $encrypted;
        $status = $user->save();
        if ($status == true) {
            return redirect()->route('user.index')->with('success', 'User : ' . $user->name . ' password changed successfully');
        } else {
            return redirect()->route('user.index')->with('error', 'Something went wrong while changing the password of the user');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $status = $user->delete();
        dd($status);
        if ($status == true) {
            return redirect()->route('user.index')->with('success', 'User deleted successfully');
        } else {
            return redirect()->route('user.index')->with('error', 'Error occured while deleting the user');
        }
    }

    public function dashboard(){
        return view('admin.index');
    }
}
