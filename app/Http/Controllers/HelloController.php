<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index($name='abc', $surname='123', $year= 987){
        return view('hello',compact('name','surname', 'year'));
    }
}
