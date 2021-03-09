<?php

namespace App\Http\Controllers\Backend\Slider;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\SliderImage;
use App\Models\userSite;
use Auth;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        // $user = userSite::where('user',$user);
        $slider = Slider::where('user_id',$user)->get();
        return view('backend/slider/index', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/slider/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // $user = Auth::user()->id;

        $id = Auth::user()->id;
        $site_id= userSite::where('user',$id)->get()->first();
        $basic=[
            'name'=>$request->name,
            'status'=>$request->status,
            'site_id'=>$site_id->site,
            'user_id'=>$id,
        ];
        $slider =Slider::create($basic);
        $slider_id= $slider->id;
        // dd($slider_id);
        $images = array();
        for ($x = 0; $x < sizeof($request['image']); $x++) {
            $image = $request->file('image')[$x];

            $filenameimage[$x] = rand(1000,100000000) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('backend/img/category/'), $filenameimage[$x]);
            // dd($filenameimage);
            $images = array(
                "slider_id" => $slider_id,
                "image" => $filenameimage[$x],
                "image_id" => $request['image_id'][$x],
            );
            SliderImage::create($images);
        }
        return redirect('slider');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user()->id;
        $site_id= userSite::where('user',$user)->get()->first();
        $slider = Slider::where('id',$id)->where('user_id',$user)->where('site_id',$site_id->site)->get()->first();
        $slider_image = SliderImage::where('slider_id',$slider->id)->get();
        return view('backend/slider/edit',compact('slider','slider_image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // dd($request);


        $user = Auth::user()->id;
        $site_id= userSite::where('user',$id)->get()->first();
        $slider= Slider::where('id',$id)->where('user_id',$user)->get()->first();
        $basic=[
            'name'=>$request->name,
            'status'=>$request->status,
        ];
        $slider->update($basic);
        // dd($slider_id);
        $images = array();
        for ($x = 0; $x < sizeof($request['image']); $x++) {
            $image = $request->file('image')[$x];

            $filenameimage[$x] = rand(1000,100000000) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('backend/img/category/'), $filenameimage[$x]);
            // dd($filenameimage);
            $images = array(
                "image" => $filenameimage[$x],
            );
            $slider_image= SliderImage::where('slider_id',$id)->where('image_id',$request['image_id'][$x])->get()->first();
            $slider_image->update($images);
        }
        return redirect('slider');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user()->id;
        $site_id= userSite::where('user',$user)->get()->first();
        $data=Slider::where('id',$id)->where('user_id',$user)->where('site_id',$site_id->site)->get()->first();
        if(!empty($data)){
            $data->delete();
        return redirect('slider');
        }else{
            return abort('404');
        }
    }
}
