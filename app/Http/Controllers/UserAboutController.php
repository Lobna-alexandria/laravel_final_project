<?php

namespace App\Http\Controllers;

use App\Models\UserAbout;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\MultiImageController;

class UserAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $MultiImg = MultiImage::all();
        $Aboutdata = UserAbout::all()->sort();
        return view(
            'AdminDashboard.userAbout.all',
            compact('Aboutdata', 'MultiImg')
        );
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
     * @param  \App\Models\UserAbout  $userAbout
     * @return \Illuminate\Http\Response
     */
    public function show(UserAbout $userAbout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserAbout  $userAbout
     * @return \Illuminate\Http\Response
     */
    public function edit(UserAbout $userAbout)
    {
        return view('AdminDashboard.userAbout.edit', compact('userAbout'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserAbout  $userAbout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserAbout $userAbout)
    {
        // dd($userAbout);
        $request->validate([
            'main_title' => 'required|min:3|max:150',
            'title' => 'required|min:20|max:100',
            'desc' => 'required|min:6',
            'image.*' => 'image|mimes:png,jpg,jpeg,svg,bmp|max:2048',
            'editor1' => 'min:3',
        ]);
        $NewData = $request->all();
        $userAbout->fill($NewData)->update();

        toast('About Updated Successfully', 'success')->timerProgressBar();
        return redirect()->route('Dabout.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserAbout  $userAbout
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserAbout $userAbout)
    {
        //
    }
}