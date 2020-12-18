<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Picture;

class PictureController extends Controller
{
    //

    public function welcome()
    {
        $pictures=Picture::paginate(5);
        return view('welcome',compact('pictures'));
    }
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
            $path=uniqid() . '.jpg';
            $file->move('images/' . $request->id . '/', $path);
            $data['path']=$path;
            $data['name']=$request->picname;
            $data['user_id']=$request->id;
        }

        Picture::create($data);
        return redirect('/pictures/'. $request->id);
    }

    public function delete($id)
    {
        
        $picture=Picture::findOrFail($id);
        $uid=$picture->user_id;
        unlink('images/' . $picture->user_id . '/' . $picture->path);
        $picture->delete();
        return redirect('/pictures/'. $uid);
    }

    public function change($id)
    {
        $picture=Picture::findOrFail($id);
        return view('picture.change',compact('picture'));
    }

    public function update(Request $request)
    {
        $validated=$request->validate([
            'name'=>'required'
        ]);
        $picture=Picture::findOrFail($request->id);
        $picture->update(['name'=>$request->name]);
        return redirect('/pictures/'. $picture->user_id);
    }
}
