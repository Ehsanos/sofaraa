<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class OfficeController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.verify', ['except' => ['index']]);
    }


    public function index()
    {
        // get all office from database
        $office = Office::with(['areas', 'nation'])->latest()
            ->get();
        return response()->json([
            'stats' => true,
            'data' => $office,
        ]);
    }

    public function store(Request $request)
    {
        // return $request->all();
        // create validation
        $data = $request->only(['name', 'description', 'image', "areas", 'nation_id']);
        $validator = Validator::make($data, [
            'name' => 'required|unique:offices',
            'description' => 'required',
            'image' => 'required|image',
            'areas' => 'required',
            'nation_id' => 'required'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['stats' => false, 'errors' => $validator->messages()], 200);
        }
        if ($request->hasFile('image')) {
            $name = $request->file('image')->getClientOriginalName();
            // replace the space or % (space) to non in image name
            $name = str_replace(' ', '', $name);
            $name = str_replace('%', '', $name);
            $newNameImage = time() . '_' . $name;
            $path = public_path('/images/office/');
            $request->file('image')->move($path, $newNameImage);
            // create office
            $newOffice = new Office;
            $newOffice->nation_id = $request->get('nation_id');
            $newOffice->image_url = $newNameImage;
            $newOffice->name = $request->get('name');
            $newOffice->description = $request->get('description');
            $newOffice->save();
            // using  relationship
            $newOffice->areas()->attach($this->handelAreasArray($request->get('areas')));
            return response()->json(['stats' => true, 'data' => $newOffice]);
        }
    }



    public function update(Request $request, $id)
    {

        $data = $request->only(['name', 'description', 'areas', 'nation_id']);
        $validator = Validator::make($data, [
            'name' => 'required',
            'description' => 'required',
            "areas" => "required",
            'nation_id' => 'required'
        ]);
        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['state' => false, 'errors' => $validator->messages()], 200);
        }
        $office = Office::with('areas')->find($id);

        $office->name = $request->get('name');

        $office->description = $request->get('description');

        $office->nation_id = $request->get('nation_id');


        if ($request->hasFile('image')) {
            File::delete(public_path('images/office/' . $office->getAttribute('image_url')));
            try {
                $name = $request->file('image')->getClientOriginalName();
                $newNameImage = time() . '_' . $name;
                $path = public_path('/images/office');
                $request->file('image')->move($path, $newNameImage);
                $office->image_url = $newNameImage;
            } catch (Exception $e) {
                // errors
                return response()->json([
                    'state' => false,
                    'errors' => $e
                ], 400);
            }
        }


        $office->areas()->sync($this->handelAreasArray($request->get('areas')));
        $office->save();
        $NEWOffice = Office::with('areas')->find($id);
        return response()->json(['state' => true, 'data' => $NEWOffice]);
    }


    public function destroy(Office $office)
    {
        $image = $office->getAttribute('image_url');

        $status = $office->delete();
        if ($status) {
            File::delete(public_path('images/office/' .  $image));
            $array_areas = $office->areas;
            $array_id_area = [];
            foreach ($array_areas as $area) {
                array_push($array_id_area, (int)$area->id);
            }

            $office->areas()->detach($array_id_area);
            return response()->json([
                'state' => true
            ]);
        } else {
            return response()->json([
                'state' => false
            ]);
        }
    }


    public function countOffice()
    {
        $office_t = Office::where('nation_id', 1)->count();
        $office_s = Office::where('nation_id', 2)->count();
        return response()->json([
            'stats' => true,
            'office_turkey' => $office_t,
            'office_syria' => $office_s,
        ]);
    }


    //
    //
    //
    // privet function (function in this class )
    function handelAreasArray($areas)
    {
        $array =  array_map('intval', explode(',', $areas));
        $result = [];
        foreach ($array as $item) {
            if ($item == '[' || $item == ']' || $item == ',') {
                continue;
            } else {
                array_push($result, (int)$item);
            }
        }
        return $result;
    }
}
