<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

class DropzoneController extends Controller
{
    public function upload(Request $request)
    {
//        if(isset($request->file)) {
//            $file_path = $request->file('file')->move('uploads', 'public');
//        }
//        else {
//            $file_path = '';
//        }
//
//        $main_image[$request->file('file')->getClientOriginalName()] = $file_path;

        if ($request->ajax()) {
            $image = $request->file('file');

            $imageName = $image->getClientOriginalName();

            $image->move(public_path('/storage/images'), $imageName);

            return response()->json([
                'status' => 'success',
                'image' => $imageName
            ]);
        }
    }
}
