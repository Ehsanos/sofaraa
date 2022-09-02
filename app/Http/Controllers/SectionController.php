<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.verify', ['except' => ['index',]]);
    }

    public function index()
    {
        $sections = Section::with('areas', 'projects', 'nations')->get();
        return response()->json([
            'stats' => true,
            'data' => $sections,
        ]);
    }

    public function show($id)
    {
        $section = Section::find($id)->with('projects')->get();
        return response()->json(['data' => $section]);
    }

    public function update(Request $request, $section_id)
    {
        // nots: all field is required from updating section
        $data = $request->only(['name', 'description', 'nations']);
        $validator = Validator::make($data, [
            'name' => 'required',
            'description' => 'required',
            'nations' => 'required'
        ]);
        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['state' => false, 'errors' => $validator->messages()], 200);
        }
        $section = Section::find($section_id);
        $section->name = $request->get('name');
        $section->description = $request->get('description');
//        do not this (using relation )
        $section->nation_id = 1;
//
        if ($request->hasFile('image')) {
            File::delete(public_path('images/section/' . $section->getAttribute('image_url')));
            try {
                $name = $request->file('image')->getClientOriginalName();
                $newNameImage = time() . '_' . $name;
                $path = public_path('/images/section');
                $request->file('image')->move($path, $newNameImage);
                $section->image_url = $newNameImage;
            } catch (Exception $e) {
                // errors
                return response()->json([
                    'state' => false,
                    'errors' => $e
                ], 400);
            }
        }


        $section->save();

        $section->areas()->sync($this->handelAreasArray($request->get('areas')));
        $section->nations()->sync($this->handelAreasArray($request->get('nations')));
        return response()->json(['state' => true, 'data' => $section]);
    }

    function handelAreasArray($areas)
    {
        $array = array_map('intval', explode(',', $areas));

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

    public function store(Request $request)
    {
        // create validation
        $data = $request->only(['name', 'description', 'image', 'areas', 'nations']);
        $validator = Validator::make($data, [
            'name' => 'required|unique:sections',
            'description' => 'required',
            'image' => 'required|image',
            'areas' => 'required',
            'nations' => "required"

        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['state' => false, 'errors' => $validator->messages()], 200);
        }


        if ($request->hasFile('image')) {
            $name = $request->file('image')->getClientOriginalName();
            // replace the space or % (space) to non in image name
            $name = str_replace(' ', '', $name);
            $name = str_replace('%', '', $name);
            $newNameImage = time() . '_' . $name;
            $path = public_path('/images/section/');
            $request->file('image')->move($path, $newNameImage);
            // create office
            $newSection = new Section;
            $newSection->image_url = $newNameImage;
            $newSection->name = $request->get('name');
            //
            // update for using relation default val 0
            $newSection->nation_id = 1;
            //
            $newSection->description = $request->get('description');
            $newSection->save();
            // using  relationship
            $newSection->areas()->attach($this->handelAreasArray($request->get('areas')));
            $newSection->nations()->attach($this->handelAreasArray($request->get('nations')));
            return response()->json(['state' => true, 'data' => $newSection]);
        }
        return response('error', 500);
    }

    public function destroy(Section $section)
    {
        $image = $section->getAttribute('image_url');
        $nations = array();
        foreach ($section->nations as $item) {
            array_push($nations, $item->id);
        }
        $section->nations()->detach($nations);
        $status = $section->delete();
        if ($status) {
            $nations = array();
            foreach ($section->nations as $item) {
                array_push($nations, $item->id);
            }
            $section->nations()->detach($nations);
            File::delete(public_path('images/section/' . $image));
            $array_areas = $section->areas;
            $array_id_area = [];
            foreach ($array_areas as $area) {
                array_push($array_id_area, (int)$area->id);
            }
            $section->areas()->detach($array_id_area);
            return response()->json([
                'state' => true
            ]);
        } else {
            return response()->json([
                'state' => false
            ]);
        }
    }

    public function sectionCount()
    {
        $sectionCount = Section::count();
        return response()->json(['state' => true, 'data' => $sectionCount]);
    }
}
