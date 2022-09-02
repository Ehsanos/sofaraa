<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\File;

class AboutUsController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.verify', ['except' => ['index',]]);
    }
    public function index()
    {
        $about_us_content = AboutUs::first();
        return response()->json(['state' => true, 'data' => $about_us_content]);
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'description' => 'required',
            'video' => 'required',
        ]);
        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['state' => false, 'errors' => $validator->messages()], 200);
        }
        $images = array();
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $name = $image->getClientOriginalName();
                $newNameImage = time() . '_' . $name;
                $path = public_path('/images/aboutUs');
                $image->move($path, $newNameImage);
                array_push($images,  $newNameImage);
            }
        }
        $about_us_content = AboutUs::find(1);
        if (count($images) > 0) {
            $oldImages = array();
            $oldImages = $about_us_content->getAttribute('images');
            foreach ($oldImages as $image) {

                File::delete(public_path('images/aboutUs/' .  $image));
            }

            $about_us_content->images = $images;
        }
        $about_us_content->description = $request->get('description');
        $about_us_content->video = $request->get('video');
        $about_us_content->save();
        return response()->json(['state' => true]);
    }
    public function delete_image(Request $request)
    {
        $item = AboutUs::find(1);
        $images = $item->images;
        $isExit = in_array($request->get('image'), $images);


        if ($isExit) {
            $index = array_search($request->get('image'), $images);
            unset($images[$index]);
            $new_image = array();
            foreach ($images as $imag) {
                array_push($new_image, $imag);
            }
            $item->images = $new_image;
            $item->save();
            return response()->json(['state' => true]);
        } else {

            return response()->json(['state' => false, 'error' => 'the item is not found ']);
        }
    }
}
