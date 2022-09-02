<?php

namespace App\Http\Controllers;

use App\Http\Controllers\core\projectCoreController;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Validator;

// Number of donors total_amount
class ProjectController extends projectCoreController
{
    public $pathFolderImages = '/images/project';

    public function __construct()
    {
        $this->middleware('jwt.verify', ['except' => ['index', 'show']]);
    }


    public function index(Request $request)
    {

        if ($request->get('archive') != null) {
            $project = Project::where(["is_archive" => (int)$request->get('archive')])->with(['section', 'areas', 'campaign'])->latest()->get();
        } else if ($request->get('finish') != null) {
            $project = Project::where(["finish_state" => $request->get('finish')])->with(['section', 'areas', 'campaign'])->latest()->get();
        } else {
            $project = Project::with(['section', 'areas', 'campaign'])->latest()->get();
        }

        return response()->json([
            'stats' => true,
            'data' => $project,
        ]);
    }


    public function store(Request $request)
    {
        // create validation [ areas , video url , section id , camping id , ]its optional
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:projects',
            'section_id' => "required",
            'total_amount' => "required",
            'description.en' => 'required|string',
            'description.tr' => 'required|string',
            'description.ar' => 'required|string',
        ], ['description.en.required' => 'the EN description is required',
            'description.ar.required' => 'the AR description is required',
            'description.tr.required' => 'the Tr description is required']);
        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['state' => false, 'errors' => $validator->messages()], 200);
        }

        $images_ar = $request->file('images_ar');
        $images_tr = $request->file('images_tr');
        $images_en = $request->file('images_en');
        $project = new Project;


        if ($request->hasFile('images_ar')) {
            $project->images_ar = $this->storeImages((array)$images_ar, $this->pathFolderImages);
        }
        if ($request->hasFile('images_en')) {
            $project->images_en = $this->storeImages((array)$images_en, $this->pathFolderImages);
        }
        if ($request->hasFile('images_tr')) {
            $project->images_tr = $this->storeImages((array)$images_tr, $this->pathFolderImages);
        }
        $project->title = $request->get('title');
        $project->total_amount = $request->get('total_amount');//
        $project->image_url ='';
        $project->section_id = $request->get('section_id');
        $project->vedio_url = $request->get('vedio_url');
        $project->description = $request->get('description');
//        $project->image_url = ' ';
        $project->finish_state = 0;
        $project->is_archive = $request->get('archive');
        if ($request->get('campaign_id')) {
            $project->campaign_id = $request->get('campaign_id');
        }
        if ($request->get('campaign_id')) {
            $project->campaign_id = $request->get('campaign_id');
        }
//
        $project->save();
        $project->areas()->attach($this->handelAreasArray($request->get('areas')));
//        return response('done ', 500);
        return response()->json(['state' => true, 'data' => $project]);
//        }
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

    public function show($project)
    {
        $project = Project::with(['campaign', 'section'])->find($project);
        return response()->json(['state' => true, 'data' => $project]);
    }

    public function update(Request $request, $id)
    {
        // create validation
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'section_id' => "required",
            'total_amount' => 'required',
            'description.en' => 'required|string',
            'description.tr' => 'required|string',
            'description.ar' => 'required|string',
        ],
            ['description.en.required' => 'the EN description is required',
                'description.ar.required' => 'the AR description is required',
                'description.tr.required' => 'the Tr description is required']);
        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['state' => false, 'errors' => $validator->messages()], 200);
        }

        $project = Project::find($id);

        if ($request->hasFile('images_ar')) {
            $images_ar = $request->file('images_ar');
            $project->images_ar = $this->updateImage((array)$images_ar, $project->images_ar, $this->pathFolderImages);
        }
        if ($request->hasFile('images_en')) {
            $images_en = $request->file('images_en');
            $project->images_en = $this->updateImage((array)$images_en, $project->images_en, $this->pathFolderImages);
        }
        if ($request->hasFile('images_tr')) {
            $images_tr = $request->file('images_tr');
            $project->images_tr = $this->updateImage((array)$images_tr, $project->images_tr, $this->pathFolderImages);
        }

        $project->title = $request->get('title');
        $project->description = $request->get('description');
        $project->vedio_url = $request->get('vedio_url');
        $project->section_id = $request->get('section_id');
        $project->total_amount = $request->get('total_amount');
        $project->is_archive = $request->get('archive');
        if ($request->get('campaign_id')) {
            $project->campaign_id = $request->get('campaign_id');
        }
        $project->save();
        $project->areas()->sync($this->handelAreasArray($request->get('areas')));
        return response()->json(['state' => true, 'data' => $project]);
    }

    public function destroy(Project $project)
    {
        $this->deleteImagesArray($project->images_ar, $this->pathFolderImages);
        $this->deleteImagesArray($project->images_en, $this->pathFolderImages);
        $this->deleteImagesArray($project->images_tr, $this->pathFolderImages);
        $project->areas()->detach($this->handelAreasArray($project->getAttribute('areas')));
        $status = $project->delete();
        if ($status) {
            return response()->json([
                'state' => true
            ]);
        } else {
            return response()->json([
                'state' => false
            ]);
        }
    }

    public function delete_image(Request $request, $id)
    {
        $item = Project::find($id);
        $images = $item->image_url;
        $isExit = in_array($request->get('image'), $images);
        if ($isExit) {
            $index = array_search($request->get('image'), $images);
            unset($images[$index]);
            $new_image = array();
            foreach ($images as $imag) {
                array_push($new_image, $imag);
            }
            File::delete(public_path('images/project/' . $request->get('image')));
            $item->image_url = $new_image;
            $item->save();
            return response()->json(['state' => true]);
        } else {

            return response()->json(['state' => false, 'error' => 'the item is not found ']);
        }
    }

    public function projectsCount()
    {
        $projectsCount = Project::count();
        return response()->json(['state' => true, 'data' => $projectsCount]);
    }
}
