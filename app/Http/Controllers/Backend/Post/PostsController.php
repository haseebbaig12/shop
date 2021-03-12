<?php

namespace App\Http\Controllers\Backend\Post;

use App\http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use App\Models\Language;
use App\Models\usersite;
use Auth;
use App\Models\Site;
use App\Models\Post_Text;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\View\ViewServiceProvider;

class PostsController extends Controller
{
    public function index()
    {
        $indexdata=array();
        $data= array();
        $u_id = Auth::user()->id;
       $data=$this->findUserdetail($u_id);  // $data is Function which is last in the controller

       foreach($data as $datas){
        $username = User::where('id',$datas->userID)->get()->pluck('name')->first();
$indexdata[]=array(
'id'=>$datas->id,
'meta_title'=>$datas->meta_title,
'image'=>$datas->image,
'status'=>$datas->status,
'username'=>$username,
'created_at'=>$datas->created_at
);
}
        return View('backend/posts/index',compact('indexdata'));


    }

    public function create()
    {
        $user = Auth::user()->id;
        $site = usersite::where('user',$user)->get()->first();
        $lang = Language::where('site_id',$site->id)->get();
        // dd($lang);
        $cat = Category::where('siteID',$site->id)->where('userID',$user)->get();
        return view('backend/posts/add',compact('lang','cat'));
    }

    public function store(Request $request)
    {
        $imageName='';
        $user = Auth::user()->id;
        $site_id= usersite::where('user',$user)->get()->first();
        if(!empty($request->file('image'))){
            $image = $request->file('image');
            $imageName = rand(1000,1000000).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('backend/img/postimages'),$imageName);
        }

        $basic =[
            'url'=>$request->url,
            'code'=>$request->code,
            'meta_title'=> $request->meta_title,
            'meta_desc'=> $request->meta_desc,
            'status'=>$request->status,
            'image'=>$imageName,
            'userID'=>$user,
            'siteID'=>$site_id->site,
            'catID'=>$request->category
        ];
        $postbasic = Posts::create($basic);

        $basic_pages_id=$postbasic->id;
        $Text = array();
        for($x = 0; $x < sizeof($request['title']); $x++  ){
            $Text= array(
         "postID" => $basic_pages_id,
          "title" => $request['title'][$x],
          "short_desc"  => $request['short_desc'][$x],
          "post_text"  => $request['post_text'][$x],
          "languageID" => $request['name'][$x]

        );

        Post_Text::create($Text);
    }
    return redirect()->route('posts.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $datatext=array();
        $user = Auth::user()->id;
        $site= usersite::where('user',$user)->get()->first();
        $lang = Language::where('site_id',$site->id)->get();
        $data = Posts::where('id',$id)->where('siteID',$site->id)->get()->first();
        $cat = Category::where('siteID',$site->id)->where('userID',$user)->get();
        foreach($lang as $language){

            $post = Post_Text::where('languageID',$language->id)->where('postID',$data->id)->get()->first();
            if($post!=Null ){
                $datatext[]=[
                    'lanId'=>$language['id'],
                     'name'=>$language['name'],
                     'title'=>$post['title'],
                     "short_desc"  => $post['short_desc'],
                    'post_text'=>$post['post_text']

                ];
            }
            elseif($post==Null){
                $datatext[]=[
                    'lanId'=>$language['id'],
                     'name'=>$language['name'],
                     'title'=>'',
                    'post_text'=>'',
                    'short_desc'=>''
                ];
            }

        }

        return view('backend.posts.edit',compact('data','datatext','lang','cat'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user()->id;
        $site_id= usersite::where('user',$user)->get()->first();
        $updatepost = Posts::where('id',$id)->where('userID',$user)->get()->first();

        if(!empty($request->file('image'))){
            $image = $request->file('image');
            $imageName = rand(1000,1000000).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('backend/img/postimages'),$imageName);
        }else{
            $imageName = $updatepost->image;
        }
        $basic =[
            'url'=>$request->url,
            'code'=>$request->code,
            'meta_title'=> $request->meta_title,
            'meta_desc'=> $request->meta_desc,
            'status'=>$request->status,
            'image'=>$imageName,
            'userID'=>$user,
            'siteID'=>$site_id->site
        ];
        $updatepost->update($basic);
        $postID=$updatepost->id;
        $language =$request->language;

        $x=0;
        foreach($language as $lang){
        $textupdate= Post_Text::where('postID',$postID)->where('languageID',$lang)->get()->first();
    if($textupdate != null){
    $Text = array();
        if($x==sizeof($request['title'])){
            $x=$x-1;
        }
    $Text=[
      "title" => $request['title'][$x],
      "short_desc" => $request['short_desc'][$x],
      "post_text"  => $request['post_text'][$x],
        ];
     $textupdate->update($Text);
        }
elseif($textupdate==Null){


                    $emptydata=[
                        "postID" => $postID,
                         "title" => $request['title'][$x],
                         "short_desc"  => $request['short_desc'][$x],
                         "post_text"  => $request['post_text'][$x],
                         "languageID" => $request['name'][$x]
                           ];
                           Post_Text::create($emptydata);
                }
                $x++;
            }


        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        $user = Auth::user()->id;
        $data=Posts::where('id',$id)->where('userID',$user)->get()->first();
        if(!empty($data)){
            $data->delete();
        return redirect()->route('posts.index');
        }else{
            return abort('404');
        }
    }
    public function findUserdetail($id){

        $site = usersite::where('user',$id)->get()->first();
        $data = Posts::where('siteID',$site->site)->get();
     return $data;

    }
    public function upload(Request $request){
        $fileName= $request->file('file')->getClientOriginalName();
        $path= $request->file('file')->storeAs('uploads',$fileName,'public');
        return response()->json(['location'=>url("storage/$path")]);
        // $imgpath = request()->file('file')->store('uploads','public');
        // return response()->json(['location'=>"/storage/app/public/$imgpath"]);
    }

}
