<?php

namespace App\Http\Controllers\Admin;

use App\Models\PopUp;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PopUpController extends Controller
{
    
    public function popUp(){
        $popUp = PopUp::paginate(7);
        return view('backend.pages.pop-up.pop-up', compact('popUp'));
    }

    public function popUpPost(Request $request){
        $request->validateWithBag('insert',[
            'image'=> ['image', 'mimes:jpg,png,jpeg', 'required']
        ]);
        if($request->file('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->extension();
            $request->image->storeAs('public/PopUp', $filename);

            PopUp::insert([
                'image'       =>$filename,
                'created_at'  => Carbon::now()
            ]);
            return back()->with('success', 'PopUp Image add successfully');

        }
    }
    public function popUpEdit(Request $request){
        $request->validateWithBag('update',[
            'image'=> ['image', 'mimes:jpg,png,jpeg']
        ]);
        $id = $request->id;
        $getData = PopUp::findOrFail($id);

        $filename = '';
        if($request->hasFile('image') ){
            $filename = time().'.'.$request->image->extension();
            unlink('storage/PopUp/'. $getData->image);
            $request->image->storeAs('public/PopUp', $filename);
        }else{
            $filename = $getData->image;
        }
        
        PopUp::where('id', $id)->update([
            'image' => $filename,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'PopUp Image Updated Successfully');
    }
    public function status(Request $request){
        $id = $request->id;
        $pop_ups = PopUp::where('id',$id)->first();
        if($pop_ups->is_active == 0){
            PopUp::where('id',$id)->update([
                'is_active' => '1',
                'updated_at' => Carbon::now()
            ]);
        }else{
            PopUp::where('id',$id)->update([
                'is_active' => '0',
                'updated_at' => Carbon::now()
            ]);
        }
        return response()->json([
            'status' => "OK",
        ]);
    }
    public function popUpDelete($id){
        $popUpDelete = PopUp::findOrFail($id);
        unlink(public_path('storage/PopUp/').'/'.$popUpDelete->image);
        PopUp::findOrFail($id)->delete();

        return back()->with('error', 'PopUp Image Deleted Successfully');
    }


}
