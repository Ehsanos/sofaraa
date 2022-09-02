<?php

namespace App\Http\Controllers;

use App\Models\Nation;
use Illuminate\Http\Request;

class NationController extends Controller
{
    public function index()
    {
        $nations = Nation::all();
        return response()->json(['state' => true, 'data' => $nations]);
    }
}
