<?php

namespace App\Http\Controllers\Backend\Category;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Category;
use App\Models\userSite;
use App\Models\Language;
use App\Models\CategoryText;
use App\Models\User;
use App\Models\Site;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->user=new Language;
        // dd($this->user);
    }
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
        $category = Category::where('userID',$user)->where('siteID',$site_id->site)->get();
        return view('backend/category/index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::user()->id;
        // below $language from language Model
        $language = $this->user->language($id);
        // dd($language);
        return view('backend/category/add',compact('language'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $main = $request->file('image');
        $filenamemain = rand(1000,100000000) . '.' . $main->getClientOriginalExtension();
        $main->move(public_path('backend/img/category/'), $filenamemain);
        $id = Auth::user()->id;
        // dd($request);
        $site_id= userSite::where('user',$id)->get()->first();
        $data=[
            'code'=>$request->code,
            'status'=>$request->status,
            'seo_title'=>$request->seo_title,
            'seo_desc'=>$request->seo_desc,
            'meta_key'=>$request->meta_key,
            'image'=>$filenamemain,
            'siteID'=>$site_id->site,
            'userID'=>$id,
        ];
       $category = Category::create($data);
       $category_id = $category->id;
    //    dd($category_id);
       $text = array();
       for ($x = 0; $x < sizeof($request['language']); $x++) {
           // dd($request['name']);
        //    dd($request['short_description'][$x]);
           $text = array(
               "categoryID" => $category_id,
               "title" =>$request['name'][$x],
               "short_description" =>$request['short_description'][$x],
               "language" => $request['language'][$x],
               );
               CategoryText::create($text);
       }
       return redirect('category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = Auth::user()->parentID;
        $admin = Auth::user()->id;
        // below $language from language Model
        $language = $this->user->language($user);
        $site_id= userSite::where('user',$admin)->get()->first();
        $data=Category::where('id',$id)->where('userID',$admin)->where('siteID',$site_id->site)->get()->first();

        if(!empty($data)){
            return view('backend.attribute.edit',compact('data','site_id','language'));
        }else{
            return abort('404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $user = Auth::user()->id;
        $site_id= userSite::where('user',$user)->get()->first();
        $category=Category::where('id',$id)->where('userID',$user)->where('siteID',$site_id->site)->get()->first();

        $main = $request->file('image');
        if($main != null){
        $filenamemain = rand(1000,100000000) . '.' . $main->getClientOriginalExtension();
        $main->move(public_path('backend/img/category/'), $filenamemain);
        }else{
            $filenamemain= $category->image;
        }
        if(!empty($category)){
        $data=[
            'code'=>$request->code,
            'status'=>$request->status,
            'seo_title'=>$request->seo_title,
            'seo_desc'=>$request->seo_desc,
            'meta_key'=>$request->meta_key,
            'image'=>$filenamemain,
        ];

       $category->update($data);
    //    dd($category);
       $text = array();
       for ($x = 0; $x < sizeof($request['name']); $x++) {

           $text = array(
               "title" =>$request['name'][$x],

               "short_description" =>$request['short_description'][$x],
               );
               $categorytext = CategoryText::where('categoryID',$id)->where('language',$request['language'][$x])->get()->first();

               $categorytext->update($text);
       }
            return redirect('category');
        }else{
            return abort('404');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user()->id;
        $site_id= userSite::where('user',$user)->get()->first();
        $data=Category::where('id',$id)->where('userID',$user)->where('siteID',$site_id->site)->get()->first();
        if(!empty($data)){
            $data->delete();
        return redirect('category');
        }else{
            return abort('404');
        }
    }
}
