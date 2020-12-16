<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Picture;

class PictureController extends Controller
{
    //
    public function pictures($id)
    {
        $pictures=Picture::where('user_id',$id)->paginate(5);
        return view('picture.showpictures',compact('pictures'));
    }

    public function upload()
    {
        return view('picture.uploadpicture');
    }

    public function save(Request $request)
    {
        $validated=$request->validate([
            'picture'=>'required | image',
            'picname'=>'required',
        ]);

        if($file=$request->file('picture')){
            $name=$request->picname . '.jpg';
            $file->move('images/' . $request->id . '/', $name);
            $data['path']=$name;
            $data['user_id']=$request->id;
        }

        Picture::create($data);
        return redirect('/pictures/'. $request->id);
    }

    public function delete($id)
    {
        
        $picture=Picture::findOrFail($id);
        $uid=$picture->user_id;
        $picture->delete();
        return redirect('/pictures/'. $uid);
    }
}
