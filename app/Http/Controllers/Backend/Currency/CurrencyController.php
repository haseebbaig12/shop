<?php

namespace App\Http\Controllers\Backend\Currency;
use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Models\userSite;
use Auth;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
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
        $currency = Currency::where('user_id',$user)->get();
        return view('backend.currencies.index', compact('currency'));
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
        return view('backend.currencies.add',compact('site_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Currency::create($request->all());
        return redirect('currency');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Currency $currency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $user = Auth::user()->id;
        $data=Currency::where('id',$id)->where('user_id',$user)->get()->first();
        if(!empty($data)){
            return view('backend.currencies.edit',compact('data'));
        }else{
            return abort('404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $user = Auth::user()->id;
        $data=Currency::where('id',$id)->where('user_id',$user)->get()->first();
        if(!empty($data)){
            $data->update($request->all());
            return redirect('currency');
        }else{
            return abort('404');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $user = Auth::user()->id;
        $data=Currency::where('id',$id)->where('user_id',$user)->get()->first();
        if(!empty($data)){
            $data->delete();
        return redirect()->route('currency.index');
        }else{
            return abort('404');
        }
    }
}
