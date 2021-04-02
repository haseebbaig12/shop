<?php

namespace App\Http\Controllers\Backend\Page;
use Auth;
use App\Models\Pages;
use App\Models\PagesText;
use App\Models\userSite;
use App\Models\Language;
use App\http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class PageController extends Controller
{

    public function index()
    {
        $indexdata=array();
        $data= array();
        $data=$this->findUserdetail(session()->get('site'));  // $data is Function which is last in the controller
        // dd($data);
        foreach($data as $datas){
            $username = User::where('id',$datas->userID)->get()->pluck('name')->first();
            $pagetitle = PagesText::where('pagesID',$datas->id)->get()->pluck('title')->first();
            // dd();

            $indexdata[]=array(
                'id'=>$datas->id,
                'title'=>$pagetitle,
                'code'=>$datas->code,
                'image'=>$datas->image,
                'status'=>$datas->status,
                'username'=>$username,
                'created_at'=>$datas->created_at
            );
        }
        // dd($indexdata);
        return view('backend/pages/index',compact('indexdata'));
    }

    public function create()
    {
        $lang = Language::where('site_id',session()->get('site'))->get();
        return view('backend/pages/add',compact('lang'));
    }


    public function store(Request $request)
    {
        $site_id= userSite::where('site',session()->get('site'))->get()->first();
        if(!empty($request->file('image'))){
            $image = $request->file('image');
            $imageName = rand(1000,1000000).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('backend/img/pagesimages'),$imageName);
        }else {
            $imageName ='';
        }

        $basic =[
            'url'=>$request->url,
            'code'=>$request->code,
            'meta_title'=> $request->meta_title,
            'meta_desc'=> $request->meta_desc,
            'status'=>$request->status,
            'image'=>$imageName,
            'userID'=> session()->get('id'),
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
        $datatext=array();
        $lang = Language::where('site_id',session()->get('site'))->get();
        //        dd($lang);
        $pagedata = Pages::where('id',$id)->where('siteID',session()->get('site'))->get()->first();

        foreach ($lang as $language){
            $pagetext = PagesText::where('languageID',$language->id)->where('pagesID',$pagedata->id)->get()->first();
            if($pagetext != Null){

                $datatext[] = [
                'lanId' =>$language->id,
                'name'=>$language->name,
                "title" => $pagetext['title'],
                "page_text"  => $pagetext['page_text']
                 ];
            }


            elseif($pagetext == Null){
                $datatext[]=[
                    'lanId' =>$language['id'],
                    'name'=>$language['name'],
                    "title" => '',
                    "page_text"  => ''
                ];
            }
        }


        return view('backend.pages.edit',compact('pagedata','datatext',));

    }


    public function update(Request $request, $id)
    {

        $site = session()->get('site');
        $updatepages = Pages::where('id',$id)->where('siteID',$site)->get()->first();
        //    dd($updatepages);
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
            'userID'=>session()->get('id'),
            'siteID'=>$site
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


        $data = Pages::where('siteID',$id)->get();
        return $data;

    }
    public function upload(Request $request){
        $fileName= $request->file('file')->getClientOriginalName();
        $path= $request->file('file')->storeAs('pageimages',$fileName,'l');
        return response()->json(['location'=>url("storage/$path")]);
        // $imgpath = request()->file('file')->store('uploads','public');
        // return response()->json(['location'=>"/storage/app/public/$imgpath"]);
    }
    public function pagedetails($slug){
        $pagedetails = array();
        $page = Pages::where('url',$slug)->get()->first();
        $pagetext = PagesText::where('PagesID',$page->id)->get()->first();
        $pagedetails[]=[
            'id'=>$page->id,
            'image'=>$page->image,
            'title'=>$pagetext->title,
            'text'=>$pagetext->page_text,
            'pagedate'=>$page->created_at
        ];
        return view('frontend/page/page',compact('pagedetails'));
    }

}
