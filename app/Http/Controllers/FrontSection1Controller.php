<?php

namespace App\Http\Controllers;
use App\Models\FrontSection1;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Intervention\Image\Facades\Image;

class FrontSection1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $AlldataP = FrontSection1::all()->sort();
        return view('AdminDashboard.portfolio.all', compact('AlldataP'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // , get_defined_vars()
        return view('AdminDashboard.portfolio.add');
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
     * @param  \App\Models\FrontSection1  $frontSection1
     * @return \Illuminate\Http\Response
     */
    public function show(FrontSection1 $frontSection1)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FrontSection1  $frontSection1
     * @return \Illuminate\Http\Response
     */
    public function edit(FrontSection1 $frontSection1)
    {
        return view('AdminDashboard.portfolio.edit', compact('frontSection1'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FrontSection1  $frontSection1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FrontSection1 $frontSection1)
    {
        $request->validate([
            'main_title' => 'required|min:3|max:300',
            'title' => 'min:3',
            'btn_name' => 'min:3',
            'video' => 'min:3',
            'image' => 'image|mimes:png,jpg,jpeg,svg,bmp|max:3048',
        ]);
        // dd($request);
        $request_data = $request->except('_token', 'image');

        if ($request->file('image')) {
            // حنمسح صورته القديمه
            if ($frontSection1->image != 'default.png') {
                unlink(public_path('uploads/profile/' . $frontSection1->image));
            }
            $imageName =
                uniqid() . $request->file('image')->getClientOriginalName();
            Image::make($request->file('image'))
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/profile/' . $imageName));

            $request_data['image'] = $imageName;
        }

        $frontSection1->update($request_data);

        toast('portfolio Updated Successfully', 'success')->timerProgressBar();
        return redirect()->route('welcome');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FrontSection1  $frontSection1
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrontSection1 $frontSection1)
    {
        //
    }
}