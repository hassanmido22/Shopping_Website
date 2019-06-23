<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;

use App\whitelist;
class whitelist_controller extends Controller
{
    //
    public function displaywhitelist()
    {
        $list=whitelist::where('user_id',"like",Auth::user()->id)->get();
        return view('whitelist')->with(['list'=>$list

        ]);
    }
    public function addtowhitelist(Request $request)
    { $white=new whitelist();
        $white->user_id=Auth::user()->id;
        $white->product_id=$request->input('product_id');
        $white->name=$request->input('name');
        $white->description=$request->input('description');
        $white->price=$request->input('price');
        $white->save();
        return redirect('/whitelist/');
    }

}

