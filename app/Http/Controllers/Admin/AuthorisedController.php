<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Authorised;
use Carbon\Carbon;

class AuthorisedController extends Controller
{
    public function authorised(){
        $authorised = Authorised::paginate(10);
        return view('backend.pages.authorisedBy.authorisedby', compact('authorised'));
    }
    // insert data
    public function authorisedPost(Request $request){
        $request->validateWithBag('insert',[
            'image'=> ['image', 'mimes:jpg,png,jpeg', 'required'],
        ]);
        if($request->file('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->extension();
            $request->image->storeAs('public/authorisedby', $filename);

            Authorised::insert([
                'image' =>$filename,
            'created_at' => Carbon::now()
            ]);
            return back()->with('success', 'Image add successfully');
        }
    }
    public function authorisedEdit(Request $request){
        $request->validateWithBag('update',[
            'image'=> ['image', 'mimes:jpg,png,jpeg', 'required'],
        ]);
        $id = $request->id;
        $getData = Authorised::findOrFail($id);

        $filename = '';
        $imagePath = 'storage/authorisedby/'.$getData->image;
        if($request->hasFile('image')){
            $filename =  time().'.'.$request->image->extension();
            unlink($imagePath);
            $request->image->storeAs('public/authorisedby', $filename);
        }else{
            $filename = $getData->image;
        }

        Authorised::where('id', $id)->update([
            'image' =>$filename,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'Edit Update Successfully');
    }
    public function authorisedDelete($id){
        $authorisedDelete = Authorised::findOrFail($id);
        unlink(public_path('storage/authorisedby/').'/'.$authorisedDelete->image);
        Authorised::findOrFail($id)->delete();

        return back()->with('error', 'Delete Successfully');
    }
    
}
