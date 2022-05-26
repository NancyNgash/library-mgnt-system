<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { {
            $users = user::orderBy('id', 'DESC')->get();
            return view('admin.user.index', compact('users'));
        }
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $name = $request->get('name');
        $role = $request->get('role');
        $email = $request->get('email');
        $password = $request->get('password');


        $user = User::create([
            'name' => $name,
            'role' => $role,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        Session::flash('message', 'User added successfully');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $name = $request->input('name');
        $role = $request->input('role');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $password = $request->input('password');
        $user_id = $request->input('user_id');


        $update = DB::table('users')
            ->where('id', $user_id)
            ->update([
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'password' => $password
            ]);

        if ($update == true) {
            Session::flash('message', 'user updated successfully');
            return redirect()->route('users.index');
        } else {
            Session::flash('message', 'Not updated');
            return redirect()->route('users.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        Session::flash('delete-message', 'user deleted successfully');
        return redirect()->route('users.index');
    }
}
