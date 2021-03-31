<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductText;
use App\Models\ProductImage;
use App\Models\ProductType;
use App\Models\ProductCategory;
use App\Models\Category;
use App\Models\CategoryText;
use App\Models\Attribute;
use App\Models\AttributeText;
use App\Models\Variation;
class SingleProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.product.single-product');
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
        $typ=array();
        $product= Product::where('slug',$id)->get()->first();

        if(session()->get('lang') != null){
            $language = session()->get('lang');
        }else{
            $language = 1;
        }

        $producttext= ProductText::where('product_id',$product->id)->where('language',$language)->get()->first();
        $productimg = ProductImage::where('product_id',$product->id)->get();
        $ProductCategory = ProductCategory::where('productID',$product->id)->get()->first();
        $categoryText = CategoryText::where('categoryID',$ProductCategory->categoryID)->where('language',$language)->get()->first();
        $category = Category::where('id',$ProductCategory->categoryID)->get()->first();
        $type = ProductType::where('product_id',$product->id)->get(['attribute','variation']);
        $pro=array();
        $x=0;
        foreach( $type as $types) {
            $ProductAttr = Attribute::where('id', $types->attribute)->get()->first();
            $ProductAttrText =AttributeText::where('attributeID', $types->attribute)->where('language',$language)->get()->first();
            $ProductAttrTextDefault =AttributeText::where('attributeID', $types->attribute)->get()->first();
            $Productvar = Variation::where('attributeID', $ProductAttr['id'])->where('id', $types->variation)->get()->first();
            $typ[isset( $ProductAttrText['name']) ?  $ProductAttrText['name'] : $ProductAttrTextDefault['name']  ][] = $Productvar['name'];
            // dd($typ);
        }
        //       **************************   Product Array ********************************
        $pro[] = [
            'slug' => $product->slug,
            'price'=>  $product->price,
            'stock'=>  $product->stock,
            'id' => $product->id,
            'feature_image' => $product->feature_image,
            'name' =>isset($producttext->name) ? $producttext->name : '' ,
            'category' =>isset($categoryText) ? $categoryText : ''  ,
            'category_slug' => $category->code,
            'short_desc' =>isset($producttext->short_description) ? $producttext->short_description : ''   ,
            'long_desc' => isset($producttext->long_description) ? $producttext->long_description : ''   ,
            'language' =>isset( $producttext->language) ?  $producttext->language : ''   ,
            'gallery' => $productimg,
            'attribute'=>$typ,
        ];


        return view('frontend.product.single-product',compact('pro'));
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
