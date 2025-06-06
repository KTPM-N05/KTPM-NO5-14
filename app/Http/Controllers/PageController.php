<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        return view('clients.index'); // resources/views/index.blade.php
    }

    public function store() {
        return view('clients.store'); // resources/views/store.blade.php
    }

    public function product() {
        return view('clients.product'); // resources/views/product.blade.php
    }

    public function checkout() {
        return view('clients.checkout'); // resources/views/checkout.blade.php
    }
    public function blank(){
        return view('clients.blank');// resources/views/blank.blade.php
    }
    public function camera(){
        return view('clients.camera'); //resources/views/camera.blade.php
    }
    public function telephone(){
        return view('clients.telephone'); //resorces/views/telephone.blade.php
    }
    public function laptop(){
        return view('clients.laptop'); //resources/views/laptop/blade.php
    }
    public function login() {
        return view('clients.login'); // resources/views/login.blade.php
    }
    public function register() {
        return view('clients.register'); // resources/views/register.blade.php
    }
    public function dashboard() {
        return view('dashboard'); // resources/views/dashboard.blade.php
    }
}