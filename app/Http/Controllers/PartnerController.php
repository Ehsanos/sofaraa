<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\File;


class PartnerController extends Controller
{
    public function index()
    {
        $partners =  Partner::all();
        return response()->json(['state' => true, 'data' => $partners]);
    }
    public function store(Request $request)
    {
        // return $request->all();
        // create validation
        $data = $request->only(['image']);
        $validator = Validator::make($data, [
            'image' => 'required'
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
            $path = public_path('/images/partner/');
            $request->file('image')->move($path, $newNameImage);
            // create office
            $newPartner = new Partner;
            $newPartner->image = $newNameImage;
            $newPartner->save();
            return response()->json(['stats' => true, 'data' => $newPartner]);
        }
    }
    public function destroy(Partner $partner)
    {
        $image = $partner->getAttribute('image');
        File::delete(public_path('images/partner/' .  $image));
        $state = $partner->delete();
        return response()->json(['state' => $state]);
    }
}
