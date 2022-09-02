<?php

// namespace App\Http\Controllers;

// use App\Models\Area;
// use Illuminate\Http\Request;

// class AreasController extends Controller
// {
//     public function __construct()
//     {
//         $this->middleware('jwt.verify', ['except' => ['index']]);
//     }
//     public function index()
//     {
//         $areas = Area::latest()->with('offices')->get();
//         return response()->json(['state' => true, "data" => $areas]);
//     }
//     public function areaCount()
//     {
//         $areaCount = Area::count();
//         return response()->json(['state' => true, 'data' => $areaCount]);
//     }
// }
