<?php

namespace App\Http\Controllers;

use App\Models\Working;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class WorkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Alldata = Working::all()->sort();
        return view('AdminDashboard.working.all', compact('Alldata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminDashboard.working.add');
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
            'title' => 'required|min:3|max:150',
            // 'desc' => 'required',
            'icon' => 'image|mimes:png,jpg,jpeg,svg,bmp|max:2048',
        ]);
        $request_data = $request->except('_token', 'icon');
        // لو استقبل ملف صورة وقت الحفظ
        if ($request->file('icon')) {
            $imageName =
                uniqid() . $request->file('icon')->getClientOriginalName();
            Image::make($request->file('icon'))
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/working/' . $imageName));

            $request_data['icon'] = $imageName;
        }
        $working = Working::create($request_data);

        // Alert::success('User Added ', 'SuccessFully');
        toast('Service Added Successfully', 'success')->timerProgressBar();

        return redirect()->route('work.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Working  $working
     * @return \Illuminate\Http\Response
     */
    public function show(Working $working)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Working  $working
     * @return \Illuminate\Http\Response
     */
    public function edit(Working $working)
    {
        // dd($working);
        return view('AdminDashboard.working.edit', compact('working'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Working  $working
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Working $working)
    {
        $request->validate([
            'title' => 'required|min:3|max:150',
            'desc' => 'required|min:10',
            'icon' => 'image|mimes:png,jpg,jpeg,svg,bmp,webp|max:3048',
        ]);
        // dd($request);
        $request_data = $request->except('_token', 'icon');

        if ($request->file('icon')) {
            // حنمسح صورته القديمه
            if ($working->icon != 'default.png') {
                unlink(public_path('uploads/working/' . $working->icon));
            }
            $imageName =
                uniqid() . $request->file('icon')->getClientOriginalName();
            Image::make($request->file('icon'))
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/working/' . $imageName));

            $request_data['icon'] = $imageName;
        }

        $working->update($request_data);

        toast('Working Updated Successfully', 'success')->timerProgressBar();
        return redirect()->route('work.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Working  $working
     * @return \Illuminate\Http\Response
     */
    public function destroy(Working $working)
    {
        $working->delete();
        toast('working Deleted Successfully', 'success')->timerProgressBar();
        return redirect()->route('work.index');
    }
}