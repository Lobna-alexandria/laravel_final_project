<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Alldata = Service::all()->sort();
        return view('AdminDashboard.service.all', compact('Alldata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminDashboard.service.add');
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
        $request->validate([
            'name' => 'required|min:3|max:150',
            'desc' => 'required',
            'editor1' => 'required|min:6',
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
                ->save(public_path('uploads/services/' . $imageName));

            $request_data['image'] = $imageName;
        }
        $service = Service::create($request_data);

        // Alert::success('User Added ', 'SuccessFully');
        toast('Service Added Successfully', 'success')->timerProgressBar();

        return redirect()->route('service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('AdminDashboard.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|min:3|max:150',
            'desc' => 'required|min:10',
            'editor1' => 'required|min:6',
            'image' => 'image|mimes:png,jpg,jpeg,svg,bmp|max:3048',
        ]);
        // dd($request);
        $request_data = $request->except('_token', 'image');

        if ($request->file('image')) {
            // حنمسح صورته القديمه
            if ($service->image != 'default.png') {
                unlink(public_path('uploads/services/' . $service->image));
            }
            $imageName =
                uniqid() . $request->file('image')->getClientOriginalName();
            Image::make($request->file('image'))
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/services/' . $imageName));

            $request_data['image'] = $imageName;
        }

        $service->update($request_data);

        toast('service Updated Successfully', 'success')->timerProgressBar();
        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        toast('service Deleted Successfully', 'success')->timerProgressBar();
        return redirect()->route('service.index');
    }
}
