<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return $users;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::check()){
            return redirect("/");
        }
        return view("register");
    }

    public function store(Request $req)
    {

        $req->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|min:6|confirmed"
        ]);

        $data = $req->only(["name" , "email" , "password"]);
        
        User::create($data);
        return redirect("/login");
    }

    public function login()
    {
        if(Auth::check()){
            return redirect("/");
        }
        return view("login");
    }

    public function verify(Request $req){
        $validator = $req->validate([
            "email" => "required|email",
            "password" =>"required|min:6"

        ]);

        
        if(Auth::attempt($validator)){
            return redirect("/");
        }

        return redirect("login");
        
    }

    public function logout(){
        Auth::logout();
        return redirect("login");
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        $user->categories;
        $user->tasks;
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
