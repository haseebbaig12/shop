<?php

namespace App\Http\Controllers\Frontend\blog;
use App\http\Controllers\Controller;
use App\Models\Post_Text;
use App\Models\Posts;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postcomplete= array();
        $post = Posts::where('status',1)->get();
        foreach($post as $posts){
            $postdetail = Post_Text::where('postID',$posts->id)->get();
            foreach($postdetail as $details){
        $postcomplete[]=[
            'postid'=>$posts['id'],
            'posturl'=>$posts['url'],
            'posttitle'=>$details['title'],
            'postimage'=>$posts['image'],
            'short_desc'=>$details['short_desc'],
            'postdate'=>$details['created_at'],

        ];
    }}
        // dd($postcomplete);
        return view('frontend.blog.blogposts',compact('postcomplete'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
    public function singlepost($slug)
    {
        // dd($slug);
        $post = Posts::where('url',$slug)->get()->first();
                $postdetail= Post_Text::where('postID',$post->id)->get()->first();
        // dd($postdetail);
        return view('frontend.blog.singlepost',compact('postdetail','post'));
    }
    public function test(){

        return view('test');
    }
    public function test1(Request $request){


        dd($request['indexs'],$request['positions']);
//        foreach ($request['indexs'] as $key=>$value){
//            dd($value);
//        }
//        if (isset($_POST['indexs'])){
//            foreach ($_POST['indexs'] as $id){
//                $index = $id;
//                dd($index);
//                $cat = DB::table('categories')->where('id',$request['index'] )->update('order_id',$request['Positions']);
            }
//            exit('success');
//        }
//    }
}
