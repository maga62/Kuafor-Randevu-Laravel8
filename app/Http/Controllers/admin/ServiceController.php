<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datalist=Service::all();
        return view("admin.service",[
            'datalist'=>$datalist
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_list=Category::with('children')->get();
        return view("admin.service_add",[
            "category_list"=>$category_list
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new service;
        $data->category_id = $request->category_id;
        $data->user_id = Auth::id();
        $data->title=$request->title;
        $data->keywords=$request->keywords;
        $data->description=$request->description;
        $data->price=$request->price;
        $data->detail=$request->detail;
        $data->status=$request->status;
        $data->slug=$request->slug;

        $data->image=Storage::putFile("images",$request->file("image"));
        $data->save();
        return redirect()->route("admin_service");
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
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service,$id)
    {
        $category_list=Category::with('children')->get();
        $data=Service::find($id);
        return view("admin.service_update",[
            'data'=>$data,
            'category_list'=>$category_list
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,Service $service)
    {
        $data=Service::find($id);
        $data->category_id = $request->category_id;
        $data->user_id = Auth::id();
        $data->title=$request->title;
        $data->keywords=$request->keywords;
        $data->description=$request->description;
        $data->price=$request->price;
        $data->detail=$request->detail;
        $data->status=$request->status;
        $data->slug=$request->slug;
        if($request->image){
            $data->image=Storage::putFile("images",$request->file("image"));
        }
        $data->save();
        return redirect()->route("admin_service")->with("success","Action Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service,$id)
    {
        Service::destroy($id);
        return redirect()->route("admin_service");
    }
}
