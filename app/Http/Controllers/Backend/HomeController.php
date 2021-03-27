<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use App\Models\PagesText;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application Dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('/home');
    }
    public function menus(){
        $pagesmenu = array();
        $site = session()->get('site');
        $pagedata= Pages::where('siteID',$site)->get();
        foreach ($pagedata as $pagedatas){
            $pagetext = PagesText::where('pagesID',$pagedatas['id'])->get()->first();
            $pagesmenu[]=[
                'pageID'=>$pagedatas['id'],
                'pageSlug'=>$pagedatas['url'],
                'pageCode'=>$pagedatas['code'],
                'pageTitle'=>$pagetext->title,

            ];

        }
        return view('frontend/layouts/header',compact('pagesmenu'));
    }
}
