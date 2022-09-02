<?php

namespace App\Http\Controllers;

use App\Http\Controllers\core\projectCoreController as controller;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Validator;


class PostController extends controller
{
    public function index()
    {
//        $posts = Post::with('nations')->get();
        $posts = Post::latest()->with('nations')->paginate(5);
        return response()->json(['stats' => true, 'data' => $posts]);
    }

    public function store(Request $request)
    {
        // create validation
        $validator = Validator::make($request->all(), ['image' => 'required|image', 'description.en' => 'required|string', 'description.tr' => 'required|string', 'description.ar' => 'required|string',], ['description.en.required' => 'the EN description is required', 'description.ar.required' => 'the AR description is required', 'description.tr.required' => 'the Tr description is required']);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['state' => false, 'errors' => $validator->messages()], 200);
//            return response()->json(['state' => false, 'errors' => $request->all()], 200);
        }


        if ($request->hasFile('image')) {
            $name = $request->file('image')->getClientOriginalName();
            // replace the space or % (space) to non in image name
            $name = str_replace(' ', '', $name);
            $name = str_replace('%', '', $name);
            $newNameImage = time() . '_' . $name;
            $path = public_path('/images/post/');
            $request->file('image')->move($path, $newNameImage);
            // create office
            $post = new Post();
            $post->is_archive = $request->boolean('archive');
            $post->image = $newNameImage;
            $post->title = $request->get('title');
            $post->description = $request->get('description');
            // add video 
            $post->video = $request->get('video');
            $post->save();
            $post->nations()->attach($this->handelAreasArray($request->get('nations')));
            // using  relationship
            return response()->json(['state' => true, 'data' => $post]);
        }
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


    public function update(Request $request, $post_id)
    {
        $validator = Validator::make($request->all(),
            ['description.en' => 'required|string',
                'description.tr' => 'required|string',
                'description.ar' => 'required|string',],
                ['description.en.required' => 'the EN description is required',
                'description.ar.required' => 'the AR description is required',
                'description.tr.required' => 'the Tr description is required']);
        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['state' => false, 'errors' => $validator->messages()], 200);
//            return response()->json(['state' => false, 'errors' => $request->all()], 200);
        }
        $post = Post::find($post_id);
        $nations_ids = $this->handelAreasArray($request->get('nations'));
        $post->nations()->sync($nations_ids);
        $post->title = $request->get('title');
        $post->description = $request->get('description');
        $post->is_archive = $request->boolean('archive');
        // add video 
        $post->video = $request->get('video');
        if ($request->hasFile('image')) {
            File::delete(public_path('/images/post/' . $post->getAttribute('image')));
            try {
                $name = $request->file('image')->getClientOriginalName();
                $newNameImage = time() . '_' . $name;
                $path = public_path('/images/post');
                $request->file('image')->move($path, $newNameImage);
                $post->image = $newNameImage;
            } catch (Exception $e) {
                // errors
                return response()->json(['state' => false, 'errors' => $e], 400);
            }
        }
        $post->save();
        return response()->json(['state' => true, 'data' => $post]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return JsonResponse
     */
    public function destroy(Post $post)
    {
        $image = $post->getAttribute('image');
        $nations = array();
        foreach ($post->nations as $item) {
            array_push($nations, $item->id);
        }
        $post->nations()->detach($nations);

        $status = $post->delete();
        if ($status) {
            File::delete(public_path('images/post/' . $image));
            return response()->json(['state' => true]);
        } else {
            return response()->json(['state' => false]);
        }
    }
}
