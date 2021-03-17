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

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::where('userID',session()->get('id'))->where('siteID',session()->get('site'))->get();
        return view('backend/category/index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $id = Auth::user()->parentID;
        // below $language from language Model
        $language = session()->get('language');

        return view('backend/category/add',compact('language'));
    }

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

    public function show(Category $category)
    {
        //
    }

    public function edit($id)
    {
        $categorydata = array();
        $language = session()->get('language');
        $data=Category::where('id',$id)->where('userID',session()->get('id'))->where('siteID',session()->get('site'))->get()->first();
        foreach ($language as $lang){
            $cattext=CategoryText::where('language',$lang->id)->where('categoryID',$data->id)->get()->first();
            if($cattext != Null){
                $categorydata[]=[
                    'languageid'=> $lang->id,
                    'languagename'=> $lang->name,
                    'title'=>$cattext->title,
                    'short_description'=>$cattext->short_description
                ];}
            if($cattext == null){
                $categorydata[]=[
                    'languageid'=> $lang->id,
                    'languagename'=> $lang->name,
                    'title'=>'',
                    'short_description'=>'',
                ];}
        }
        if(!empty($data)){
            return view('backend.category.edit',compact('data','categorydata'));
        }else{
            return abort('404');
        }
    }

    public function update(Request $request,$id)
    {
        $language = session()->get('language');
        $category=Category::where('id',$id)->where('userID',session()->get('id'))->where('siteID',session()->get('site'))->get()->first();

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
            $catid = $category->id;

            $x=0;
            foreach ($language as $lang){
                $cattext=CategoryText::where('language',$lang->id)->where('categoryID',$catid)->get()->first();
                if($cattext != null) {
                    $Text = array();
                    if ($x == sizeof($request['name'])) {
                        $x = $x - 1;
                    }
                    $Text = [
                        "categoryID" => $catid,
                        "title" => $request['name'][$x],
                        "short_description" => $request['short_description'][$x],
                        "language" => $request['language'][$x],
                    ];
                    $cattext->update($Text);

                }elseif($cattext==Null){


                    $Text=[
                        "categoryID" => $catid,
                        "title" => $request['name'][$x],
                        "short_description" => $request['short_description'][$x],
                        "language" => $request['language'][$x],
                    ];
                    CategoryText::create($Text);
                }
                $x++;

            }

            return redirect('category');
        }else{
            return abort('404');
        }
    }


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
