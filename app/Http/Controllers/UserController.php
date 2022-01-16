<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Service;
use App\Models\Time;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view("home.user_profile");
    }

    public function myreview(){
        $datalist=Review::where('user_id','=',Auth::id())->get();
        return view("home.user_review",[
            'datalist'=>$datalist
        ]);
    }
    public function randevu_alma(){
        $datalist=Time::where("Status","Boş")->get();
        $service_list=Service::where("status","True")->get();
        return view("home.randevu_page",[
            'datalist'=>$datalist,
            'service_list'=>$service_list
        ]);
    }
    public function saatgetir($id){
        if($id!=0){
            $datalist=Time::where("date",$id)->where("status","Boş")->get();
            return view("home.randevu_saat",[
                'saat'=>$datalist
            ]);
        }
    }

    public function deletereview(Review $review,$id)
    {
        Review::destroy($id);
        return redirect()->route("myreview");
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
