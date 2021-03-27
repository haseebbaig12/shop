<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductText;
use App\Models\ProductImage;
use App\Models\ProductCategory;
use App\Models\Category;
use App\Models\CategoryText;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(session()->get('lang') != null){
            $language = session()->get('lang');
        }else{
            $language = 1;
        }
//        dd($language);
        $product= Product::where('status',1)->get();
        foreach( $product as $products){
            $producttext= ProductText::where('product_id',$products->id)->where('language',$language)->get()->first();
            $productimg = ProductImage::where('product_id',$products->id)->get();
            $ProductCategory = ProductCategory::where('productID',$products->id)->get()->first();
            $categoryText = CategoryText::where('categoryID',$ProductCategory->categoryID)->where('language',$language)->get()->first();
            $category = Category::where('id',$ProductCategory->categoryID)->get()->first();
//       **************************   Product Array ********************************
            $compproduct[]= [
                'slug'=>  $products->slug,
                'price'=>  $products->price,
                'stock'=>  $products->stock,
                'id' => $products->id,
                'feature_image'=>$products->feature_image,

                'name' =>isset($producttext->name) ? $producttext->name : '' ,
                'category' =>isset($categoryText) ? $categoryText : '',
                'category_slug'=>isset($category->code) ? $category->code : '',
                'short_desc' =>isset($producttext->short_description) ? $producttext->short_description : '' ,
                'long_desc' => isset($producttext->long_description) ? $producttext->long_description : '' ,
                'language' => isset($producttext->language) ? $producttext->language : '',

            ];
        }       
      return view('frontend.product.product',compact('compproduct'));

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($slug);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
