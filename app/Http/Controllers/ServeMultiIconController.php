<?php

namespace App\Http\Controllers;

use App\Models\ServeMultiIcon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Intervention\Image\Facades\Image;
class ServeMultiIconController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allSIcons = ServeMultiIcon::all();
        return view('AdminDashboard.servMultiIcon.all', compact('allSIcons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminDashboard.servMultiIcon.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'linkname' => 'required|min:3|max:150',

            'image' => 'image|mimes:png,jpg,jpeg,svg,bmp|max:2048',
        ]);
        $request_data = $request->except('_token', 'image');
        // لو استقبل ملف صورة وقت الحفظ
        if ($request->file('image')) {
            $imageName =
                uniqid() . $request->file('image')->getClientOriginalName();
            Image::make($request->file('image'))
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/ServMultiIcons/' . $imageName));

            $request_data['image'] = $imageName;
        }
        $serveMultiIcon = ServeMultiIcon::create($request_data);

        // Alert::success('User Added ', 'SuccessFully');
        toast('Socila Media Added Successfully', 'success')->timerProgressBar();

        return redirect()->route('ServeMultiIcon.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServeMultiIcon  $serveMultiIcon
     * @return \Illuminate\Http\Response
     */
    public function show(ServeMultiIcon $serveMultiIcon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServeMultiIcon  $serveMultiIcon
     * @return \Illuminate\Http\Response
     */
    public function edit(ServeMultiIcon $serveMultiIcon)
    {
        return view(
            'AdminDashboard.servMultiIcon.edit',
            compact('serveMultiIcon')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServeMultiIcon  $serveMultiIcon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServeMultiIcon $serveMultiIcon)
    {
        $request->validate([
            'linkname' => 'required|min:3|max:150',
            'image' => 'image|mimes:png,jpg,jpeg,svg,bmp|max:3048',
        ]);
        // dd($request);
        $request_data = $request->except('_token', 'image');

        if ($request->file('image')) {
            // حنمسح صورته القديمه
            if ($serveMultiIcon->image != 'default.png') {
                unlink(
                    public_path(
                        'uploads/ServMultiIcons/' . $serveMultiIcon->image
                    )
                );
            }
            $imageName =
                uniqid() . $request->file('image')->getClientOriginalName();
            Image::make($request->file('image'))
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/ServMultiIcons/' . $imageName));

            $request_data['image'] = $imageName;
        }

        $serveMultiIcon->update($request_data);

        toast('Icon Updated Successfully', 'success')->timerProgressBar();
        return redirect()->route('ServeMultiIcon.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServeMultiIcon  $serveMultiIcon
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServeMultiIcon $serveMultiIcon)
    {
        //
    }
}