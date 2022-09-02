<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.verify');
    }
    public function index()
    {
        $user = User::with('role')->paginate(10);
        return response()->json(['state' => true, 'data' => $user,]);
    }
    public function update(Request $request, $id)
    {
        // nots: the password field is option
        $data = $request->only(['name', 'email', 'role_id']);
        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required|email',
            'role_id' => 'required|integer',
        ]);
        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['state' => false, 'errors' => $validator->messages()], 200);
        }

        $user = User::find($id);
        $user->email = $request->get('email');
        $user->name = $request->get('name');
        $user->role_id = $request->get('role_id');
        //  password field is optional
        if ($request->get('password')) {
            $user->password = Hash::make($request->get('password'));
        }
        $user->save();
        return response()->json(['state' => true,]);
    }
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['state' => true]);
    }
    public function store(Request $request)
    {
        $data = $request->only(['name', 'email', 'role_id', 'password']);
        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role_id' => 'required|integer',
            'password' => "required|min:8"
        ]);
        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['state' => false, 'errors' => $validator->messages()], 200);
        }
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'role_id' => $request->get('role_id'),
        ]);
        return response()->json(['state' => true, 'data' => $user]);
    }
    public function getRoles()
    {
        $roles = Role::all();
        return response()->json(['state' => true, 'data' => $roles]);
    }

    public function count()
    {

        $users = User::count();
        return response()->json(['state' => true, 'data' => $users]);
    }
}
