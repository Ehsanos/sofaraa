<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Validator;
use Exception;
use Illuminate\Http\Request;

class AreaController extends Controller
{

    public function __construct()
    {
        $this->middleware('jwt.verify', ['except' => ['index',]]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::with(['offices', 'sections',])->latest()->get();
        return response()->json([
            'stats' => true,
            'data' => $areas,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only(['name']);
        $validator = Validator::make($data, [
            'name' => 'required|unique:areas',
        ]);
        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['state' => false, 'errors' => $validator->messages()], 200);
        }
        $area = new Area;
        $area->name = $request->get('name');
        $area->save();
        return response()->json(['state' => true, 'data' => $area]);
    }




    public function update(Request $request, $id)
    {
        $data = $request->only(['name']);
        $validator = Validator::make($data, [
            'name' => 'required',
        ]);
        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['state' => false, 'errors' => $validator->messages()], 200);
        }
        $area = Area::find($id);
        $area->name = $request->get('name');
        $area->save();
        return response()->json(['state' => true, 'data' => $area]);
    }

    public function destroy($id)
    {
        try {
            $area = Area::find($id);
            if ($area) {
                $area->delete();
                return response()->json(['state' => 'true']);
            } else {
                return response()->json(['state' => false]);
            }
        } catch (Exception $e) {
            return response()->json(['state' => false, 'errors' => $e]);
        }
        return response()->json(['state' => true]);
    }
    public function areaCount()
    {
        $areaCount = Area::count();
        return response()->json(['state' => true, 'data' => $areaCount]);
    }
}
