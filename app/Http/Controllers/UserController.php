<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsers(Request $request)
    {
        $user = User::All();

        return  $user;
    }

    public function getUser(Request $request, $id)
    {
        $user = User::FindOrfail($id);
        
        return [
            'succesfully' => $user
        ];
    }

    public function storeUser(Request $request)
    {
        $user = new User;
        
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->role = $request->role;
        $user->save();

        return $user;

        
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->role = $request->role;
        $user->save();

        return $user;
    }

    public function deleteUser(Request $request, $id)
    {
        $user = User::Find($id);
        $user->delete();
        
        return $user;
    }
    
}
