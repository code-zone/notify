<?php

namespace App\Http\Controllers;

use Bouncer;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(12);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|string', 'email' => 'required|email|unique:users', 'role' => 'required|in:admin,clerk', 'password' => 'required|min:6|confirmed']);
        $user = User::create($request->input());
        $user->assign($request->get('role'));
        
        return redirect()->route('users.index');
    }

    /**
     * Block a specific user from accessing the dashboard
     *
     * @param \App\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function block(User $user)
    {
        $user->active = false;
        $user->save();
        session()->flash('messages', ['message' => "The user {$user->name} has been blocked from accessing the dashboard", 'type' => 'info', 'title' => 'User Blocked']);

        return back();
    }

    /**
     * Block a specific user from accessing the dashboard
     *
     * @param \App\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function unblock(User $user)
    {
        $user->active = true;
        $user->save();
        session()->flash('messages', ['message' => "The user {$user->name} has been granted access to the dashboard", 'type' => 'success', 'title' => 'Access Granted']);

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, ['name' => 'required|string', 'email' => 'required|email|unique:users,email,'.$user->id, 'role' => 'required|in:admin,clerk,student']);
        Bouncer::retract(strtolower($user->role))->from($user);
        $user->update($request->all());

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
