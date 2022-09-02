<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Validator;

class CampaignController extends Controller
{
    public $pathFolderImages = 'images/camping/';

    public function __construct()
    {
        $this->middleware('jwt.verify', ['except' => ['index']]);
    }

    public function index()
    {
        $camping = Campaign::with(['project', 'section', 'nations'])->get();
        return response()->json(['state' => true, 'data' => $camping]);
    }


    public function countCamping()
    {
        $active = Campaign::where('status', 1)->count();
        $an_active = Campaign::where('status', 0)->count();
        return response()->json(['stats' => true, 'active' => $active, 'an_active' => $an_active]);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), ['title' => 'required|unique:campaigns', 'status' => 'required', 'total_amount' => 'required', 'description.en' => 'required|string', 'description.tr' => 'required|string', 'description.ar' => 'required|string',], ['description.en.required' => 'the EN description is required', 'description.ar.required' => 'the AR description is required', 'description.tr.required' => 'the Tr description is required']);
        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['state' => false, 'errors' => $validator->messages()], 200);
        }
        $camping = new Campaign;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $camping->image_url = $this->handelStoreObjectImages($image, $this->pathFolderImages);
            $camping->title = $request->get('title');
//using relation delete this
            $camping->nation_id = 1;
//
            $camping->description = $request->get('description');
            $camping->status = $request->get('status');
            $camping->total_amount = $request->get('total_amount');
        }


        $camping->vedio_url = $request->get('vedio_url');

        $camping->project_id = $request->get('project_id');

        $camping->section_id = $request->get('section_id');


        $camping->save();
        $camping->nations()->attach($this->handelAreasArray($request->get('nations')));
        return response()->json(['state' => true, 'data' => $camping]);
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


    public function destroy(Campaign $camping)
    {
        // $image

        $images = $camping->getAttribute('image_url');
        $nations = array();
        foreach ($camping->nations as $item) {
            array_push($nations, $item->id);
        }
        $camping->nations()->detach($nations);

        $status = $camping->delete();
        if ($status) {
            $this->handelDeleteObjectImages($images, $this->pathFolderImages);
        } else {
            return response()->json(['state' => false]);
        }
    }


    public function update(Request $request, $id)
    {
        $data = $request->only(['title', 'description', 'image', 'vedio_url', 'project_id', 'total_amount', 'status']);
        $validator = Validator::make($data, ['title' => 'required',
            'status' => 'required', 'total_amount' => 'required',
            'description.en' => 'required|string',
            'description.tr' => 'required|string',
            'description.ar' => 'required|string'],
            ['description.en.required' => 'the EN description is required',
                'description.ar.required' => 'the AR description is required',
                'description.tr.required' => 'the Tr description is required']);
        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['state' => false, 'errors' => $validator->messages()], 200);
        }

        $camping = Campaign::find($id);
        $camping->title = $request->get('title');
        $camping->description = $request->get('description');
        $camping->vedio_url = $request->get('vedio_url');
        $camping->project_id = $request->get('project_id');
        $camping->section_id = $request->get('section_id');
        $camping->nation_id = $request->get('nation_id');
        $camping->total_amount = $request->get('total_amount');
     
            $camping->status = $request->boolean('status');
        
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            $oldImage = $camping->getAttribute('image_url');
            //  delete old image for slider

            $camping->image_url = $this->handelUpdateObjectImages($oldImage, $images, $this->pathFolderImages);
        }
        $camping->save();
        $camping->nations()->sync($this->handelAreasArray($request->get('nations')));

        return response()->json(['state' => true, 'data' => $camping]);

    }
}
