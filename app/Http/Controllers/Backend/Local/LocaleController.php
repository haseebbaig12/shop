<?php

namespace App\Http\Controllers\Backend\Local;
use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Language;
use App\Models\Site;
use App\Models\userSite;
use Auth;
use App\Models\Locale;
use Illuminate\Http\Request;
use League\Flysystem\Adapter\Local;

class LocaleController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $site = userSite::where('user',$user)->get()->first();
        $locale = Locale::where('user_id',$user)->where('site_id',$site->site)->get();
        return view('backend.locale.index', compact('locale'));
    }
    public function create()
    {
      $user = Auth::user()->id;
       $data['site']  = userSite::where('user',$user)->get()->first();
       $data['language'] = Language::where('user_id',$user)->where('site_id', $data['site']->site)->get();
       $data['currency']  = Currency::where('user_id',$user)->where('site_id', $data['site']->site)->get();

        return view('backend.locale.add',$data);
    }
    public function store(Request $request)
    {
      $request->validate([
            'language_id' => 'required',
            'currency_id' => 'required',
            'status' => 'required',
        ]);
        $request->session()->flash('message','Post Has Been Added');

        Locale::create($request->all());
        return redirect('locale');
    }
    public function show(Locale $locale)
    {
        //
    }
    public function edit( $id)
    {
        $user = Auth::user()->id;
        $data['site']  = userSite::where('user',$user)->get()->first();
        $data['locale']=Locale::where('id',$id)->where('user_id',$user)->where('site_id',$data['site']->site)->get()->first();
       $data['language'] = Language::where('user_id',$user)->where('site_id', $data['site']->site)->get();
       $data['currency']  = Currency::where('user_id',$user)->where('site_id', $data['site']->site)->get();
        if(!empty($data['locale'])){
            return view('backend.locale.edit',$data);
        }else{
            return abort('404');
        }
    }
    public function update(Request $request, $id)
    {
        $user = Auth::user()->id;
        $data=Locale::where('id',$id)->where('user_id',$user)->get()->first();
        if(!empty($data)){
            $data->update($request->all());
            return redirect('locale');
        }else{
            return abort('404');
        }
    }

    public function destroy($id)
    {
        $user = Auth::user()->id;
        $data=Locale::where('id',$id)->where('user_id',$user)->get()->first();
        if(!empty($data)){
            $data->delete();
        return redirect()->route('locale.index');
        }else{
            return abort('404');
        }
    }
}
