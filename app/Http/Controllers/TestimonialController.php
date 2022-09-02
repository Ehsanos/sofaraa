<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Exception;
use Validator;

class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.verify', ['except' => ['index',]]);
    }
    public function index()
    {
        $items = Testimonial::all();
        return response()->json(['stats' => true, 'data' => $items]);
    }



    public function store(Request $request)
    {

        // create validation
        $data = $request->only(['title', 'description', 'image']);
        $validator = Validator::make($data, [
            'image' => 'required|image'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->messages()], 200);
        }


        if ($request->hasFile('image')) {
            $name = $request->file('image')->getClientOriginalName();
            // replace the space or % (space) to non in image name
            $name = str_replace(' ', '', $name);
            $name = str_replace('%', '', $name);
            $newNameImage = time() . '_' . $name;
            $path = public_path('/images/testimonial/');
            $request->file('image')->move($path, $newNameImage);
            // create office
            $Testimonial = new Testimonial;
            $Testimonial->url = $newNameImage;
            $Testimonial->title = $request->get('title');
            $Testimonial->description = $request->get('description');
            $Testimonial->save();
            // using  relationship
            return response()->json(['state' => true, 'data' => $Testimonial]);
        }
    }






    public function update(Request $request,  $testimonial_id)
    {
        // not create validation
        $testimonial = Testimonial::find($testimonial_id);
        $testimonial->title = $request->get('title');
        $testimonial->description = $request->get('description');

        if ($request->hasFile('image')) {
            File::delete(public_path('images/testimonial/' . $testimonial->getAttribute('url')));
            try {
                $name = $request->file('image')->getClientOriginalName();
                $newNameImage = time() . '_' . $name;
                $path = public_path('/images/testimonial');
                $request->file('image')->move($path, $newNameImage);
                $testimonial->url = $newNameImage;
            } catch (Exception $e) {
                // errors
                return response()->json([
                    'state' => false,
                    'errors' => $e
                ], 400);
            }
        }
        $testimonial->save();
        return response()->json(['state' => true, 'data' => $testimonial]);
    }


    public function destroy(Testimonial $testimonial)
    {
        $image = $testimonial->getAttribute('url');

        $status = $testimonial->delete();
        if ($status) {
            File::delete(public_path('images/testimonial/' .  $image));
            return response()->json([
                'state' => true
            ]);
        } else {
            return response()->json([
                'state' => false
            ]);
        }
    }
}
