<?php

namespace App\Http\Controllers\Backend\Page;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
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
        return view('backend/pages/index',compact('indexdata'));
    }

    public function create()
    {
        $user = Auth::user()->id;
        $site=User::find($user)->site()->first();
        $lang =Site::find($site->id)->language;
        return view('backend/pages/add',compact('lang'));
    }


    public function store(Request $request)
    {

        $user = Auth::user()->id;
        $site_id= userSite::where('user',$user)->get()->first();
        $image = $request->file('image');
        $imageName = rand(1000,1000000).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('backend/img/pagesimages'),$imageName);
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
        $pagesbasic = Pages::create($basic);
        $basic_pages_id=$pagesbasic->id;
        $Text = array();
        for($x = 0; $x < sizeof($request['title']); $x++  ){
            $Text= array(
                "pagesID" => $basic_pages_id,
                "title" => $request['title'][$x],
                "page_text"  => $request['page_text'][$x],
                "languageID" => $request['language'][$x]

            );

            PagesText::create($Text);
        }
        return redirect()->route('pages.index');

    }


    public function show(Pages $pages)
    {
        //
    }


    public function edit($id)
    {
        $user = Auth::user()->id;
        $site=User::find($user)->site()->first();
        $lang =Site::find($site->id)->language;
        $data = Pages::where('id',$id)->where('siteID',$site->id)->get()->first();
        $datatext = PagesText::where('pagesID',$data->id)->get();

        return view('backend.pages.edit',compact('data','datatext','lang'));

    }


    public function update(Request $request, $id)
    {
        $user = Auth::user()->id;
        $site_id= userSite::where('user',$user)->get()->first();
        $updatepages = Pages::where('id',$id)->where('userID',$user)->get()->first();

        if(!empty($request->file('image'))){
            $image = $request->file('image');
            $imageName = rand(1000,1000000).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('backend/img/pagesimages'),$imageName);
        }else{
            $imageName = $updatepages->image;
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
        $updatepages->update($basic);

        $pagesID=$updatepages->id;

        $textupdate= PagesText::where('pagesID',$pagesID)->get();
        $language =$request->language;
        $Text = array();
        $x=0;


        foreach($textupdate as $key=>$value){
            if($x==sizeof($request['title'])){
                $x=$x-1;
            }
            $Text=[
                "pagesID" => $pagesID,
                "title" => $request['title'][$x],
                "page_text"  => $request['page_text'][$x],
                "languageID" => $request['language'][$x]
            ];
            foreach($language as $lang){

                if ($value->languageID==$lang){
                    $value->update($Text);

                }
            }

            $x++;
        }
        return redirect()->route('pages.index');
    }

    public function destroy( $id)
    {
        $user = Auth::user()->id;
        $data=Pages::where('id',$id)->where('userID',$user)->get()->first();
        if(!empty($data)){
            $data->delete();
            return redirect()->route('pages.index');
        }else{
            return abort('404');
        }
    }
    public function findUserdetail($id){

        $site = userSite::where('user',$id)->get()->first();
        $data = Pages::where('siteID',$site->site)->get();
        return $data;

    }
}
