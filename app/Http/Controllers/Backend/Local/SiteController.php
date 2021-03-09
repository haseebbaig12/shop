<?php

namespace App\Http\Controllers\Backend\Local;
use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Models\userSite;
use Illuminate\Http\Request;
use Auth;
class SiteController extends Controller
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
        $site = Site::where('user_id',$user)->get();
        return view('backend/site/index', compact('site'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/site/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user = Auth::user()->id;
        Site::create($request->all());
        return redirect('site');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(site $site)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user()->id;
        $data=Site::where('id',$id)->where('user_id',$user)->get()->first();
        if(!empty($data)){
            return view('backend.site.edit',compact('data'));
        }else{
            return abort('404');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $user = Auth::user()->id;
        $data=Site::where('id',$id)->where('user_id',$user)->get()->first();
        if(!empty($data)){
            $data->update($request->all());
            return redirect('site');
        }else{
            return abort('404');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user()->id;
        $data=Site::where('id',$id)->where('user_id',$user)->get()->first();
        if(!empty($data)){
            $data->delete();
        return redirect()->route('site.index');
        }else{
            return abort('404');
        }
    }
}
