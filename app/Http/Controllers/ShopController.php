<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Requests;
use App\product;
use App\category;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    $shopProducts= product::paginate(4);
    $category=category::all();

    return view("shop")->with(['shopProducts'=>$shopProducts,
                                'category'=>$category]);
        
      }

/**
        * Store a newly created resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @return \Illuminate\Http\Response
        */
        public function amount(Request $request){
         
            // dd($request->minval);
            $tt= $request->input("maxval");
            
             
             $shopProducts= product::where('price', ">=", $request->minval)->where('price', "<=", $request->maxval)->paginate(4);
          
             $category=category::all();
            
     return view("shop")->with(['shopProducts'=>$shopProducts,
     'category'=>$category]);
         }
    
        public function category($id,$minval=0)
        {
           
            if($minval==0){
        $shopProducts= product::where('category','like',$id)->orderBy('id','DESC')->paginate(4);;
        $category=category::all();
    
        return view("shop")->with(['shopProducts'=>$shopProducts,
                                    'category'=>$category]);
            }
             else
             {
    
                $shopProductsAmounted= product::where('price', ">", $minval)->paginate(4);
                dd($minval);
       return response()->json($shopProductsAmounted);
            }}


            public function search(Request $request)
             {   
                $category=category::all();

         $request->validate([
            'query'=>'required|min:3',
         ]);
         $query=$request->input('query');
         $result=product::where('name','like',"%$query%")->get();
         return view('search-result',compact('result','category'));
            }    
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
