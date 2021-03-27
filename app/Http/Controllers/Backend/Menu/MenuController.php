<?php

namespace App\Http\Controllers\Backend\Menu;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Pages;
use App\Models\Posts;
use App\Models\Product;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('Welcome      to      Karachi');
        $data['category']=Category::where('status',1)->get();
        $data['pages']=Pages::where('status',1)->get();
        $data['post']=Posts::where('status',1)->get();
        $data['product']=Product::where('status',1)->get();
        return view('backend.menu.index',compact('data'));
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
     * @param  \App\Models\MenuController  $menuController
     * @return \Illuminate\Http\Response
     */
    public function show(MenuController $menuController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MenuController  $menuController
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuController $menuController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MenuController  $menuController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuController $menuController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MenuController  $menuController
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuController $menuController)
    {
        //
    }
}
