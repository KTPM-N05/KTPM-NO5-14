<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        return view('index'); // resources/views/index.blade.php
    }

    public function store() {
        return view('store'); // resources/views/store.blade.php
    }

    public function product() {
        return view('product'); // resources/views/product.blade.php
    }

    public function checkout() {
        return view('checkout'); // resources/views/checkout.blade.php
    }
    public function blank(){
        return view('blank');// resources/views/blank.blade.php
    }
    public function camera(){
        return view('camera'); //resources/views/camera.blade.php
    }
    public function telephone(){
        return view('telephone'); //resorces/views/telephone.blade.php
    }
    public function laptop(){
        return view('latop'); //resources/views/laptop/blade.php
    }
}
