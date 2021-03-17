<?php

namespace App\Http\Controllers\Backend\Product;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Auth;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\Variation;
use App\Models\ProductCategory;
use App\Models\ProductText;
use App\Models\ProductType;
use App\Models\ProductImage;
use App\Models\Language;
use App\Models\userSite;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

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
        $site_id= userSite::where('user',$user)->get()->first();
        $product = Product::where('user_id',$user)->where('site_id',$site_id->site)->get();

        return view('backend/product/index', compact('product',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::user()->parentID;
        $admin = Auth::user()->id;
        // below $language from language Model
        $language = session()->get('language');
        $site_id= userSite::where('user',$admin)->get()->first();
        $attribute= Attribute::where('userID',$admin)->where('siteID',$site_id->site)->get();
        $variation= Variation::where('userID',$admin)->where('siteID',$site_id->site)->get();
        $category= Category::where('userID',$admin)->where('siteID',$site_id->site)->where('status',1)->get();
        return view('backend/product/add',compact('language','attribute','variation','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//         dd($request);
    $id = session()->get('id');
    $site_id= userSite::where('user',$id)->get()->first();
        if($request->feature_image){
                $fimage = $request->file('feature_image');
                $featureimage = rand(10000,100000000) . '.' . $fimage->getClientOriginalExtension();
            $fimage->move(public_path('backend/img/product/'), $featureimage);
            }
    $basic=[
        'slug'=>$request->slug,
        'status'=>$request->status,
        'meta_title'=>$request->meta_title,
        'meta_description'=>$request->meta_description,
        'site_id'=>$site_id->site,
        'user_id'=>$id,
        'feature_image'=>$featureimage,
    ];
    $productcreate =Product::create($basic);
    $product_id= $productcreate->id;
    $product_cat = array();
        for ($x = 0; $x < sizeof($request['category']); $x++) {
            // dd($request['name']);
            $product_cat = array(
                "productID" => $product_id,
                "categoryID" => $request['category'][$x],
                );
                ProductCategory::create($product_cat);
        }
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
    $product_var = array();
    if($request['variation']){
        for ($x = 0; $x < sizeof($request['variation']); $x++) {
            $product_var = array(
                "product_id" => $product_id,
                "variation" =>$request['variation'][$x],
                "attribute" => $request['attribute'][$x],
                "price" => $request['price'][$x],
                "ide" => rand(10,100000000),

                );
                // dd($product_var);
                ProductType::create($product_var);
        }
    }
    $images = array();
if($request['image']){
        for ($x =0 ; $x < sizeof($request['image']); $x++) {
            // dd($request['image']);
            // dd("p");
            $image = $request->file('image')[$x];
            $filenameimage[$x] = rand(1000,100000000) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('backend/img/product/'), $filenameimage[$x]);
            // dd($filenameimage);
            $images = array(
                "product_id" => $product_id,
                "image" => $filenameimage[$x],
                "image_id" => rand(1,100),
            );
            ProductImage::create($images);
        }
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
    $data = array();
       $language = Language::where('site_id',session()->get('site'))->where('status',1)->get();
       $product = Product::where('id',$id)->where('site_id',session()->get('site'))->get()->first();
        $category = Category::where('siteID',session()->get('site'))->get();
        $product_image = ProductImage::where('product_id',$id)->get();
        $product_category = ProductCategory::where('productID',$id)->get();
        $attribute= Attribute::where('siteID',session()->get('site'))->get();
        $variation= Variation::where('siteID',session()->get('site'))->get();
        $product_type= ProductType::where('product_id',$id)->get();

        foreach($language as $lang){
            $product_text = ProductText::where('language',$lang->id)->where('product_id',$id)->get()->first();
            $category = Category::where('siteID',session()->get('site'))->get();
            if($product_text!=Null ){
                $data[]=[
                    'lanId'=>$lang['id'],
                    'lanname'=>$lang['name'],
                    'name'=>$product_text['name'],
                    'long_description'  => $product_text['long_description'],
                    'short_description'  => $product_text['short_description'],
                ];
            }

            elseif($product_text == Null){
                $data[]=[
                    'lanId'=>$lang['id'],
                    'lanname'=>$lang['name'],
                    'name'=>'',
                    "long_description"  => '',
                    "short_description"  =>'',
                ];
            }

        }
//        dd($data);
        return view('backend/product/edit',compact('language','product_image','product','data','category','attribute','variation','product_type','product_category'));
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
    $product= Product::where('id',$id)->where('site_id',session()->get('site'))->get()->first();
        if($request->feature_image){
            $fimage = $request->file('feature_image');
            $featureimage = rand(10000,100000000) . '.' . $fimage->getClientOriginalExtension();
            $fimage->move(public_path('backend/img/product/'), $featureimage);
        }else{
            $featureimage = $product->feature_image;
        }
    $basic=[
        'slug'=>$request->slug,
        'status'=>$request->status,
        'meta_title'=>$request->meta_title,
        'meta_description'=>$request->meta_description,
        'feature_image'=>$featureimage,
    ];
    $productupdate = $product->update($basic);
        $language =$request->language;
        $x=0;
        foreach($language as $lang){
            $productText= ProductText::where('product_id',$id)->where('language',$lang)->get()->first();
            if($productText != null){
                $Text = array();
                if($x==sizeof($request['name'])){
                    $x=$x-1;
                }
                $Text=[
                    "name" =>$request['name'][$x],
                    "long_description" => $request['long_description'][$x],
                    "short_description" =>$request['short_description'][$x],
                ];
                $productText->update($Text);
            }
            elseif($productText==Null){
                $emptydata=[
                    "product_id" => $id,
                    "name" =>$request['name'][$x],
                    "long_description" => $request['long_description'][$x],
                    "short_description" =>$request['short_description'][$x],
                    "language" => $request['language'][$x]
                ];
                ProductText::create($emptydata);
            }

            $x++;

        }

        $product_var = array();
        if($request['variation']){
            for ($x = 0; $x < sizeof($request['variation']); $x++) {
                $product_var = array(
                    "variation" =>$request['variation'][$x],
                    "attribute" => $request['attribute'][$x],
                    "price" => $request['price'][$x],
                );
                // dd($product_var);
                $type = ProductType::where('product_id',$id)->where('id',$request['typeID'][$x]);
                if($type){
                    $type->update($product_var);
                }

            }
        }






//        $variations= Variation::where('siteID',session()->get('site'))->where('status',1)->get();
//        dd($variations);
//        $x=0;
//        foreach($variations as $variation){
//            $type = ProductType::where('product_id',$id)->where('variation',$variation)->get()->first();
//
//            if($productText != null){
//                $Text = array();
//                if($x==sizeof($request['name'])){
//                    $x=$x-1;
//                }
//                $Text=[
//                    "name" =>$request['name'][$x],
//                    "long_description" => $request['long_description'][$x],
//                    "short_description" =>$request['short_description'][$x],
//                ];
//                $productText->update($Text);
//            }
//            elseif($productText==Null){
//                $emptydata=[
//                    "product_id" => $id,
//                    "name" =>$request['name'][$x],
//                    "long_description" => $request['long_description'][$x],
//                    "short_description" =>$request['short_description'][$x],
//                    "language" => $request['language'][$x]
//                ];
//                ProductText::create($emptydata);
//            }
//
//            $x++;
//
//        }



//        $product_var = array();
//        if($request['variation']){
//            for ($x = 0; $x < sizeof($request['variation']); $x++) {
//                $product_var = array(
//                    "variation" =>$request['variation'][$x],
//                    "attribute" => $request['attribute'][$x],
//                    "price" => $request['price'][$x],
//                );
//                $type = ProductType::where('product_id',$id)->where('id',$request['typeID'][$x]);
//                    $type->update($product_var);
//            }
//        }


        $imagess = array();
            $abc=$request['image'];
            // for ($x = 0; $x < sizeof($request['image']); $x++) {
            foreach($abc as $key=>$value){
            $image = $request->file('image')[$key];

            $filenameimage[$key] = rand(1000,100000000) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('backend/img/product/'), $filenameimage[$key]);
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
