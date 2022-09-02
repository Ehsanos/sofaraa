<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Validator;

class SliderController extends Controller
{
    public $pathFolderImages = '/images/slider';

    public function __construct()
    {
        $this->middleware('jwt.verify', ['except' => ['index',]]);
    }

    public function index()
    {
        $items = Slider::latest()->paginate(5);
        return response()->json(['stats' => true, 'data' => $items]);
    }

    public function store(Request $request)
    {

        // create validation only image required
        $data = $request->only(['title', 'description', 'image']);
        $validator = Validator::make($data, [
            'image' => 'required'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return $this->returnfilur($validator->messages());
        }
            $slider = new Slider;

        if ($request->hasFile('image')) {
            //handel images
            $image = $request->file('image');
            // create office
            //  handel image then save image name as array ..
            $slider->title = $request->get('title');
            $slider->description = $request->get('description');
            // using  relationship
        $url=  $this->handelStoreObjectImages($image, $this->pathFolderImages);
            $slider->url =$url;
        }
            $slider->save();
            return $this->returnSuccess($slider);
    }


    public function update(Request $request, $slide_id)
    {

        // not create validation
        $slider = Slider::find($slide_id);
        $slider->title = $request->get('title');
        $slider->description = $request->get('description');

        if ($request->hasFile('image')) {
            $images = $request->file('image');
            $oldImage = $slider->getAttribute('url');
            //  delete old image for slider
         $slider->url = $this->handelUpdateObjectImages($oldImage, $images, $this->pathFolderImages);
        }
        $slider->save();
        return $this->returnSuccess($slider);
    }

    public function destroy(Slider $slider)
    {
        $images = $slider->getAttribute('url');
        $status = $slider->delete();
        if ($status) {
            $this->handelDeleteObjectImages($images, $this->pathFolderImages);

            return $this->returnSuccess('done delete success');
        } else {
            return $this->returnfilur('error delete item ');
        }
    }
}
