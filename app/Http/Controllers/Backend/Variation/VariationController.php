<?php

namespace App\Http\Controllers\Backend\Variation;
use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Auth;
use App\Models\userSite;
use App\Models\Variation;
use Illuminate\Http\Request;

class VariationController extends Controller
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
        $variation = Variation::where('userID',$user)->where('siteID',$site_id->site)->get();
        return view('backend/variation/index', compact('variation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admin = Auth::user()->id;
        // // below $language from language Model
        // $language = $this->user->language($id);
        $site_id= userSite::where('user',$admin)->get()->first();
        $data=Attribute::where('userID',$admin)->where('siteID',$site_id->site)->where('status',1)->get();

        return view('backend/variation/add',compact('data'));
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
        $site_id= userSite::where('user',$id)->get()->first();
        // dd();
        $basic=[
            'attributeID'=>$request->attributeID,
            'code'=>$request->code,
            'name'=>$request->name,
            'status'=>$request->status,
            // 'language'=>$request->language,
            'userID'=>$id,
            'siteID'=>$site_id->site,
        ];
        // dd($basic);
        $attributecreate =Variation::create($basic);
        return redirect('variation');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Variation  $variation
     * @return \Illuminate\Http\Response
     */
    public function show(Variation $variation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Variation  $variation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user()->parentID;
        $admin = Auth::user()->id;
        // below $language from language Model
        $site_id= userSite::where('user',$admin)->get()->first();
        $data= Variation::where('id',$id)->where('userID',$admin)->where('siteID',$site_id->site)->get()->first();
        $attribute=Attribute::where('userID',$admin)->where('siteID',$site_id->site)->get();
        if(!empty($data)){
            return view('backend.variation.edit',compact('data','attribute'));
        }else{
            return abort('404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Variation  $variation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $user = Auth::user()->id;
       $site_id= userSite::where('user',$user)->get()->first();
       $variation=Variation::where('id',$id)->where('userID',$user)->where('siteID',$site_id->site)->get()->first();

       if(!empty($variation)){
        $data=[
            'code'=>$request->code,
            'name'=>$request->name,
            'attributeID'=>$request->attributeID,
            'status'=>$request->status,
        ];

       $variation->update($data);
       return redirect('variation');
        }else{
            return abort('404');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Variation  $variation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user()->id;
        $site_id= userSite::where('user',$user)->get()->first();
        $data=Variation::where('id',$id)->where('userID',$user)->where('siteID',$site_id->site)->get()->first();
        if(!empty($data)){
            $data->delete();
        return redirect('variation');
        }else{
            return abort('404');
        }
    }
}
