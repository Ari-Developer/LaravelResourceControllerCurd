<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $DataBag = array();
        $DataBag['menu'] = 'index'; 
        $DataBag['allUsers'] = User::where('status', 1)->orderBy('id', 'desc')->paginate(30);
        return view('index', $DataBag);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $DataBag = array();
        $DataBag['menu'] = 'create-edit'; 
        return view('create', $DataBag);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $emailExist = User::where('email', trim($request->input('email')))->count();
        if($emailExist == 0) {
            $user = new User;
            $user->name = trim($request->input('name'));
            $user->email = trim($request->input('email'));
            $user->phno = trim($request->input('phno'));
            $user->password = md5(microtime(TRUE));
            if($user->save()) {
                return back()->with('success', 'User Created Successfully.');
            }
        } else {
            return back()->with('error', 'This Email-id already exist, Try with another.');
        }
        return back()->with('error', 'Something Wrong! User Not Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $DataBag = array();
        $DataBag['menu'] = 'create-edit'; 
        $DataBag['user'] = $user;
        return view('show', $DataBag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $DataBag = array();
        $DataBag['menu'] = 'create-edit'; 
        $DataBag['user'] = $user;
        return view('edit', $DataBag);
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
        $emailExist = User::where('email', trim($request->input('email')))
        ->where('id', '!=', $user->id)->count();
        if($emailExist == 0) {
            $user->name = trim($request->input('name'));
            $user->email = trim($request->input('email'));
            $user->phno = trim($request->input('phno'));
            if($user->save()) {
                return redirect()->route('users.index')->with('success', 'User Updated Successfully.');
            }
        } else {
            return back()->with('error', 'This Email-id already exist, Try with another.');
        }
        return back()->with('error', 'Something Wrong! User Not Created Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->delete()) {
            return back()->with('success', 'User Deleted Successfully.');
        }
        return back()->with('error', 'Something Wrong!');
    }
}
