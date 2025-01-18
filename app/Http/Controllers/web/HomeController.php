<?php

namespace App\Http\Controllers\web;

use App\Models\Cat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $data['cats'] = Cat::select('id' , 'name')->get();
        return view('web.home.index')->with($data);
    }
}
