<?php

namespace App\Http\Controllers\Backend\Brand;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Brand;
use App\Models\userSite;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        // $user = userSite::where('user',$user);
        $site_id= userSite::where('user',$user)->get()->first();
        $brand = Brand::where('user_id',$user)->where('site_id',$site_id->site)->get();
        return view('backend/brands/index', compact('brand'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/brands/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
       $id = Auth::user()->id;
    //    $site_id = Auth::user()->site;
       $site_id= userSite::where('user',$id)->get()->first();
       $data=[
           'name'=>$request->name,
           'sku'=>$request->sku,
           'status'=>$request->status,
           'site_id'=>$site_id->site,
           'user_id'=>$id,
       ];
       Brand::create($data);
       return redirect('brand');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user()->id;
        $site_id= userSite::where('user',$user)->get()->first();
        $data=Brand::where('id',$id)->where('user_id',$user)->where('site_id',$site_id->site)->get()->first();
        if(!empty($data)){
            return view('backend.brands.edit',compact('data','site_id'));
        }else{
            return abort('404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $user = Auth::user()->id;
        $site_id= userSite::where('user',$user)->get()->first();
        $data=Brand::where('id',$id)->where('user_id',$user)->where('site_id',$site_id->site)->get()->first();
        if(!empty($data)){
            $data->update($request->all());
            return redirect('brand');
        }else{
            return abort('404');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user()->id;
        $site_id= userSite::where('user',$user)->get()->first();
        $data=Brand::where('id',$id)->where('user_id',$user)->where('site_id',$site_id->site)->get()->first();
        if(!empty($data)){
            $data->delete();
        return redirect('brand');
        }else{
            return abort('404');
        }
    }
}
