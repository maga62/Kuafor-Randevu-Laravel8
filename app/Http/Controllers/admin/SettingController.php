<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Setting::first();
        if($data===null){
//            return view("admin.setting_edit",[
//                'data'=>$data
//            ]);
            $data= new Setting();
            $data->title="Your Project Title";
            $data->save();
            $data=Setting::first();
            return view("admin.setting_edit",[
                'data'=>$data
            ]);
        }
//        else{
//            $data= new Setting();
//            $data->title="Your Project Title";
//            $data->save();
//            $data=Setting::first();
//            return view("admin.setting_edit",[
//                'data'=>$data
//            ]);
//
//        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id, Setting $setting)
    {
        $data=Setting::find($id);
        $data->title=$request->input('title');
        $data->keywords=$request->keywords;
        $data->description=$request->description;
        $data->company=$request->company;
        $data->adress=$request->adress;
        $data->phone=$request->phone;
        $data->fax=$request->fax;
        $data->email=$request->email;
        $data->smtpserver=$request->smtpserver;
        $data->smtpsemail=$request->smtpemail;
        $data->smtpspassword=$request->smtpspassword;
        $data->smtpport=$request->smtpport;
        $data->facebook=$request->facebook;
        $data->twitter=$request->twitter;
        $data->instagram=$request->instagram;
        $data->youtube=$request->youtube;
        $data->aboutus=$request->aboutus;
        $data->contact=$request->contact;
        $data->referances=$request->referances;
        $data->status=$request->status;
        $data->save();
        return redirect()->route("admin_setting")->with("succes","Setting is saved");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
