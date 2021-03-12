<?php

namespace App\Http\Controllers\Backend\Language;
use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Models\userSite;
use Auth;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $user = Auth::user()->id;
//        // $user = userSite::where('user',$user);
//        $languages = Language::where('user_id',$user)->get();
        $languages=session()->get('language');
        return view('backend.languages.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user()->id;
        $site_id= userSite::where('user',$user)->get()->first();
        return view('backend.languages.add',compact('site_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'sku' => 'required',
            'status' => 'required',
        ]);
        $request->session()->flash('message','Language Has Been Added');

        Language::create($request->all());
        return redirect('language');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user()->id;
        $data=Language::where('id',$id)->where('user_id',$user)->get()->first();
        if(!empty($data)){
            return view('backend.languages.edit',compact('data'));
        }else{
            return abort('404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user()->id;
        $data=Language::where('id',$id)->where('user_id',$user)->get()->first();
        if(!empty($data)){
            $data->update($request->all());
            return redirect('language');
        }else{
            return abort('404');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user()->id;
        $data=Language::where('id',$id)->where('user_id',$user)->get()->first();
        if(!empty($data)){
            $data->delete();
        return redirect()->route('language.index');
        }else{
            return abort('404');
        }
    }
}
