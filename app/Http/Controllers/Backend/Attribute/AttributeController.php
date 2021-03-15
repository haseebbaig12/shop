<?php

namespace App\Http\Controllers\Backend\Attribute;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Attribute;
use App\Models\AttributeText;
use App\Models\userSite;
use App\Models\Language;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->user=new Language;
        // dd($this->user);
    }
    public function index()
    {
        $user = Auth::user()->id;
        // $user = userSite::where('user',$user);
        $site_id= userSite::where('user',$user)->get()->first();
        $attribute = Attribute::where('userID',$user)->where('siteID',$site_id->site)->get();
        return view('backend/attribute/index', compact('attribute'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::user()->parentID;
        // below $language from language Model
        $language = session()->get('language');
        return view('backend/attribute/add',compact('language'));
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
            'code'=>$request->code,
            'status'=>$request->status,
            // 'language'=>$request->language,
            'userID'=>$id,
            'siteID'=>$site_id->site,
        ];
        // dd($basic);
        $attributecreate =Attribute::create($basic);
        $attribute_id= $attributecreate->id;
        // dd($attribute_id);
        $text = array();
        for ($x = 0; $x < sizeof($request['name']); $x++) {
            $text = array(
                "attributeID" => $attribute_id,
                "name" =>$request['name'][$x],
                "language" => $request['language'][$x],
                );
                AttributeText::create($text);
        }
        return redirect('attribute');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function show(Attribute $attribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user()->parentID;
        $admin = Auth::user()->id;
        // below $language from language Model
        $language = $this->user->language($user);
        $site_id= userSite::where('user',$admin)->get()->first();
        $data=Attribute::where('id',$id)->where('userID',$admin)->where('siteID',$site_id->site)->get()->first();
        $text=AttributeText::where('attributeID',$id)->get();

        if(!empty($data)){
            return view('backend.attribute.edit',compact('data','site_id','language','text'));
        }else{
            return abort('404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    //    dd($request);
       $user = Auth::user()->id;
       $site_id= userSite::where('user',$user)->get()->first();
       $attribute=Attribute::where('id',$id)->where('userID',$user)->where('siteID',$site_id->site)->get()->first();

       if(!empty($attribute)){
        $data=[
            'code'=>$request->code,
            'status'=>$request->status,
        ];

       $attribute->update($data);
    //    dd($category);
       $text = array();
       for ($x = 0; $x < sizeof($request['name']); $x++) {
           $text = array(
               "name" =>$request['name'][$x],
               );
               $categorytext = AttributeText::where('attributeID',$id)->where('language',$request['language'][$x])->get()->first();
               $categorytext->update($text);
       }
            return redirect('attribute');
        }else{
            return abort('404');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user()->id;
        $site_id= userSite::where('user',$user)->get()->first();
        $data=Attribute::where('id',$id)->where('userID',$user)->where('siteID',$site_id->site)->get()->first();
        if(!empty($data)){
            $data->delete();
        return redirect('attribute');
        }else{
            return abort('404');
        }
    }
}
