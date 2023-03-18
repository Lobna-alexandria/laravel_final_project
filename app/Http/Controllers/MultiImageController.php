<?php

namespace App\Http\Controllers;

use App\Models\MultiImage;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\MultiImageController;
use Intervention\Image\Facades\Image;

class MultiImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Alldata = MultiImage::all()->sort();
        return view('AdminDashboard.userAbout.all', compact('Alldata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminDashboard.userAbout.add_images');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->file('image'));
        $request->validate([
            'image.*' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $Simg) {
                $imageName = uniqid() . $Simg->getClientOriginalName(); //5452lkklobba

                Image::make($Simg)
                    ->resize(300, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->save(public_path('uploads/AboutMe/' . $imageName));
                MultiImage::create(['image' => $imageName]);
            }
        }

        toast('Photos Added Successfully', 'success')->timerProgressBar();
        return redirect()->route('Dabout.index'); // ('AdminDashboard.userAbout.all');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MultiImage  $multiImage
     * @return \Illuminate\Http\Response
     */
    public function show(MultiImage $multiImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MultiImage  $multiImage
     * @return \Illuminate\Http\Response
     */
    public function edit(MultiImage $multiImage)
    {
        // $Alldata = MultiImage::all();
        return view(
            'AdminDashboard.userAbout.edit_images',
            compact('multiImage')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MultiImage  $multiImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MultiImage $multiImage)
    {
        // .about__icons__wrap li img { object-fit : contain }
        $request->validate([
            'image.*' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        // dd($request->file('image'));
        if ($request->file('image')) {
            // حنمسح صورته القديمه
            if ($multiImage->image != 'default.png') {
                unlink(public_path('uploads/AboutMe/' . $multiImage->image));
            }
            $imageName =
                uniqid() . $request->file('image')->getClientOriginalName();
            Image::make($request->file('image'))
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/AboutMe/' . $imageName));

            // $request_data['image'] = $imageName;
            // $request->all()
            $multiImage->update(['image' => $imageName]);
        }

        toast('Photos updated Successfully', 'success')->timerProgressBar();

        return redirect()->route('Dabout.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MultiImage  $multiImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(MultiImage $multiImage)
    {
        if ($multiImage->image != 'default.png') {
            unlink(public_path('uploads/AboutMe/' . $multiImage->image));
        }
        $multiImage->delete();
        toast('About Deleted Successfully', 'success')->timerProgressBar();
        return redirect()->route('Dabout.index');
    }
}