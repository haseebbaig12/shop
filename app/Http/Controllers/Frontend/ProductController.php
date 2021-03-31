<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductText;
use App\Models\ProductImage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd(session()->get('language')[0]['id']);
//        $compproduct  = array();
//        $cart = session()->get('cart');
//        dd($cart);
        // dd($cart);
        $product= Product::where('status',1)->get();
        $producttext= ProductText::where('language',2)->get();

      foreach( $product as $products){
        $producttext= ProductText::where('product_id',$products->id)->where('language',2)->get()->first();
//        dd($producttext);
        $productimg = ProductImage::where('product_id',$products->id)->get()->first();

        $compproduct[]= [
          'slug'=>  $products->slug,
          'id' => $products->id,
          'name' =>$producttext->name,
          'short_desc' =>$producttext->short_description,
          'long_desc' => $producttext->long_description,
          'language' => $producttext->language,
        //   'image' => $productimg->image,
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
