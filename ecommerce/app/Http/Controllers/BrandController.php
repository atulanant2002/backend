<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function Brands_api(Request $request)
    {
        
        $brand_SKU = $request->brand_SKU;
        $brand_name = $request->brand_name;       

        $token = Str::random(16);

        $createcuster = new brand;
        $createcuster->brand_SKU = $brand_SKU;
        $createcuster->brand_name = $brand_name;
       
        $createcuster->brand_token = $token;
        $createcuster->save();

        return response()->json([
            'message'=>'Success', 'token'=>$token
            ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function storeData(Request $request)
    {
       $image = $request->image;

       $path = Storage::disk('s3')->put('data/images', $image);

       return response()->json([
           'message'=>'Success',
           'file'=> $image
       ]);
        
    }
    
   /* public function imageUpload($request) {
        
        $path = Storage::disk('s3');
        $path->put('images/list', $image);
       return $path;
    }*/

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
