<?php

namespace App\Http\Controllers;

use App\Models\cusUser;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Image;

class CusUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
       $data = cusUser::all();
       return view('welcome',compact('data'));
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
        $image = $request->file('photo');
        $new_photo = Str::random(3)."-".time().".".$request->photo->getClientOriginalExtension();
        Image::make($image)->save(base_path('public/uplods/').$new_photo);
        cusUser::insert($request->except('_token','photo') + [
            'photo' => $new_photo,
            'created_at' => Carbon::now()
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cusUser  $cusUser
     * @return \Illuminate\Http\Response
     */
    public function show(cusUser $cusUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cusUser  $cusUser
     * @return \Illuminate\Http\Response
     */
    public function edit(cusUser $cusUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cusUser  $cusUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cusUser $cusUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cusUser  $cusUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(cusUser $cusUser)
    {
        //
    }
}
