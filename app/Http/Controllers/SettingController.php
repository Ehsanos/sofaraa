<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.verify', ['except' => ['index',]]);
    }
    public function index()
    {
        $setting = Setting::first();
        return response()->json([
            'state' => true, 'data' => $setting
        ]);
    }
    public function update(Request $request,  $setting)
    {
        $setting = Setting::find(1);
        $setting->update($request->all());
        $setting->save();
        return  $setting;
        return response()->json(['state' => true,]);
    }
}
