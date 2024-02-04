<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TopAdvertising;
use Carbon\Carbon;

class TopAdvertisingController extends Controller
{
    public function topAdvertising(){
        $topAdvertising = TopAdvertising::paginate(7);
        return view('backend.pages.topAdvertising.topAdvertising', compact('topAdvertising'));
    }

    public function topAdvertisingPost(Request $request){
        $request->validateWithBag('insert',[
            'image'=> ['image', 'mimes:jpg,png,jpeg', 'required']
        ]);
        if($request->file('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->extension();
            $request->image->storeAs('public/topAdvertising', $filename);

            TopAdvertising::insert([
                'image'       =>$filename,
                'created_at'  => Carbon::now()
            ]);
            return back()->with('success', 'Top Advertising Image add successfully');

        }
    }
    public function topAdvertisingEdit(Request $request){
        $request->validateWithBag('update',[
            'image'=> ['image', 'mimes:jpg,png,jpeg']
        ]);
        $id = $request->id;
        $getData = TopAdvertising::findOrFail($id);

        $filename = '';
        if($request->hasFile('image') ){
            $filename = time().'.'.$request->image->extension();
            unlink('storage/topAdvertising/'. $getData->image);
            $request->image->storeAs('public/topAdvertising', $filename);
        }else{
            $filename = $getData->image;
        }
        
        TopAdvertising::where('id', $id)->update([
            'image' => $filename,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'PopUp Image Updated Successfully');
    }
    public function topstatus(Request $request){
        $id = $request->id;
        $advertising = TopAdvertising::where('id',$id)->first();
        if($advertising->is_active == 0){
            TopAdvertising::where('id',$id)->update([
                'is_active' => '1',
                'updated_at' => Carbon::now()
            ]);
        }else{
            TopAdvertising::where('id',$id)->update([
                'is_active' => '0',
                'updated_at' => Carbon::now()
            ]);
        }
        return response()->json([
            'status' => "OK",
        ]);
    }
    public function topAdvertisingDelete($id){
        $advertisignDelete = TopAdvertising::findOrFail($id);
        unlink(public_path('storage/topAdvertising/').'/'.$advertisignDelete->image);
        TopAdvertising::findOrFail($id)->delete();

        return back()->with('error', 'Delete Successfully');
    }
}
