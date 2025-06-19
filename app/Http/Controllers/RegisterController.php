<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Có thể cần nếu bạn tạo người dùng mới
use Illuminate\Support\Facades\Hash; // Có thể cần để hash mật khẩu
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationCodeMail;

class RegisterController extends Controller
{
    // Phương thức hiển thị form đăng ký
    public function register()
    {
        return view('auth.register'); // Giả sử view đăng ký nằm trong thư mục 'auth'
    }

    // Gửi mã xác nhận qua email
    public function sendVerificationCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
        ]);
        $code = rand(100000, 999999);
        // Lưu mã vào session
        session(['verification_code' => $code, 'verification_email' => $request->email]);
        // Gửi email
        Mail::to($request->email)->send(new VerificationCodeMail($code));
        return response()->json(['message' => 'Mã xác nhận đã được gửi đến email!']);
    }

    // Phương thức xử lý đăng ký
    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'verification_code' => 'required',
        ]);
        // Kiểm tra session có mã xác nhận không
        if (!session()->has('verification_code') || !session()->has('verification_email')) {
            return back()->withErrors(['verification_code' => 'Bạn chưa gửi mã xác nhận hoặc phiên đã hết hạn!'])->withInput();
        }
        // Kiểm tra mã xác nhận và email
        if (
            $request->verification_code != session('verification_code') ||
            $request->email != session('verification_email')
        ) {
            return back()->withErrors(['verification_code' => 'Mã xác nhận không đúng hoặc email không khớp!'])->withInput();
        }
        // Đăng ký tài khoản
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // Xóa mã xác nhận khỏi session để không dùng lại được
        session()->forget(['verification_code', 'verification_email']);
        return redirect()->route('login')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');

        // return 'Chức năng đăng ký chưa được triển khai đầy đủ.';
    }
}
