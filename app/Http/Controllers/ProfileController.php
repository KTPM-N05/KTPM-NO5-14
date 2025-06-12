<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('user.main');
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            // 'phone' => 'nullable|string|max:20',
            // 'address' => 'nullable|string',
            'password' => 'nullable|min:8',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        // $user->phone = $request->phone;
        // $user->address = $request->address;

        if($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Thông tin đã được cập nhật thành công!');
    }
}
