<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DictionaryController extends Controller
{
    public function index()
    {
        return view('dictionary');
    }
}
