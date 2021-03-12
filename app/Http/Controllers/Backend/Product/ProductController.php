<?php

namespace App\Http\Controllers\Backend\Product;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Auth;
use App\Models\Category;
use App\Models\ProductText;
use App\Models\ProductImage;
use App\Models\Language;
use App\Models\userSite;
use Illuminate\Http\Request;

class ProductController extends Controller
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

        $product = Product::where('user_id',$user)->where('site_id',$site_id->site)->get();
        return view('backend/product/index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $id = Auth::user()->parentID;
        $id = Auth::user()->parentID;
        // below $language from language Model
        $language = $this->user->language($id);
        // dd($language);
        $site_id= userSite::where('user',$id)->get()->first();
        return view('backend/product/add',compact('language'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $id = Auth::user()->id;
    $site_id= userSite::where('user',$id)->get()->first();
    $basic=[
        'slug'=>$request->slug,
        'status'=>$request->status,
        'site_id'=>$site_id->site,
        'user_id'=>$id,
    ];
    $productcreate =Product::create($basic);
    $product_id= $productcreate->id;


    $text = array();
        for ($x = 0; $x < sizeof($request['name']); $x++) {
            // dd($request['name']);
            $text = array(
                "product_id" => $product_id,
                "name" =>$request['name'][$x],
                "long_description" => $request['long_description'][$x],
                "short_description" =>$request['short_description'][$x],
                "language" => $request['language'][$x],
                );
             ProductText::create($text);
        }
    $images = array();

        for ($x =0 ; $x < sizeof($request['image']); $x++) {
            // dd($request['image']);
            // dd("p");
            $image = $request->file('image')[$x];
            $filenameimage[$x] = rand(1000,100000000) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('backend/img/category/'), $filenameimage[$x]);
            // dd($filenameimage);
            $images = array(
                "product_id" => $product_id,
                "image" => $filenameimage[$x],
                "image_id" => rand(1,100),
            );
            ProductImage::create($images);
        }
        return redirect('product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user()->id;
        $site_id= userSite::where('user',$user)->get()->first();
        $language = Language::where('user_id',$user)->where('site_id',$site_id->site)->where('status',1)->get();
        $product = Product::where('id',$id)->where('user_id',$user)->where('site_id',$site_id->site)->get()->first();
        $product_image = ProductImage::where('product_id',$id)->get();
        $product_text = ProductText::where('product_id',$id)->get();

        return view('backend/product/edit',compact('language','product','product_image','product_text'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

    $user = Auth::user()->id;
    $site_id= userSite::where('user',$user)->get()->first();
    $product= Product::where('id',$id)->where('user_id',$user)->where('site_id',$site_id->site)->get()->first();
    $basic=[
        'slug'=>$request->slug,
        'status'=>$request->status,
    ];
    $productcreate = $product->update($basic);
    $text = array();

        for ($x = 0; $x < sizeof($request['name']); $x++) {
            $text = array(
                "name" =>$request['name'][$x],
                "long_description" => $request['long_description'][$x],
                "short_description" =>$request['short_description'][$x],
                );
            $producttext = ProductText::where('product_id',$id)->where('language',$request['language'][$x])->get()->first();
            $producttext->update($text);
        }
    $imagess = array();
    $abc=$request['image'];
        // for ($x = 0; $x < sizeof($request['image']); $x++) {
            foreach($abc as $key=>$value){



            $image = $request->file('image')[$key];

            $filenameimage[$key] = rand(1000,100000000) . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('backend/img/category/'), $filenameimage[$key]);

        //    dd($filenameimage);
            $imagess = array(
                "image" => $filenameimage[$key],
                // "image_id" => $request['image_id'][$x],
            );

            $productimage = ProductImage::where('product_id',$id)->where('image_id',$request['image_id'][$key])->get()->first();

            $productimage->update($imagess);
        }
        return redirect('product');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user()->id;
        $site_id= userSite::where('user',$user)->get()->first();
        $data=Product::where('id',$id)->where('user_id',$user)->where('site_id',$site_id->site)->get()->first();
        if(!empty($data)){
            $data->delete();
        return redirect('product');
        }else{
            return abort('404');
        }
    }
}
