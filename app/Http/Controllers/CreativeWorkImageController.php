<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use App\Models\CreativeWork;
use Illuminate\Http\Request;
use App\Models\Creative_Work_image;
use RealRashid\SweetAlert\Facades\Alert;
use Intervention\Image\Facades\Image;

class CreativeWorkImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Alldata = Creative_Work_image::paginate(5);
        // dd($Alldata);

        return view(
            'AdminDashboard.CreativeWorkImages.all',
            compact('Alldata')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $works = CreativeWork::all();
        return view('AdminDashboard.CreativeWorkImages.add', compact('works'));
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
            'desc' => 'required',
            'crwork_id' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg,svg,bmp|max:2048',
        ]);

        $request_data = $request->except('_token', 'image', 'crwork_id');
        $NewId = implode(' ', $request->crwork_id); // للتحويل الاراي الى سترينج
        // لو استقبل ملف صورة وقت الحفظ
        if ($request->file('image')) {
            $imageName =
                uniqid() . $request->file('image')->getClientOriginalName();
            Image::make($request->file('image'))
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/crimages/' . $imageName));

            $request_data['image'] = $imageName;
        }
        $request_data['crwork_id'] = $NewId;
        $creative_Work_image = Creative_Work_image::create($request_data);

        // Alert::success('User Added ', 'SuccessFully');
        toast('Image Added Successfully', 'success')->timerProgressBar();

        return redirect()->route('CreativeWorkImg.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Creative_Work_image  $creative_Work_image
     * @return \Illuminate\Http\Response
     */
    public function show(Creative_Work_image $creative_Work_image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Creative_Work_image  $creative_Work_image
     * @return \Illuminate\Http\Response
     */
    public function edit(Creative_Work_image $creative_Work_image)
    {
        $works = CreativeWork::all();
        return view(
            'AdminDashboard.CreativeWorkImages.edit',
            compact('creative_Work_image', 'works')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Creative_Work_image  $creative_Work_image
     * @return \Illuminate\Http\Response
     */
    public function update(
        Request $request,
        Creative_Work_image $creative_Work_image
    ) {
        $request->validate([
            'desc' => 'required',
            'crwork_id' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg,svg,bmp|max:2048',
        ]);

        $request_data = $request->except('_token', 'image', 'crwork_id');
        // $NewId = implode(' ', $request->crwork_id); // للتحويل الاراي الى سترينج
        // dd($NewId);
        // لو استقبل ملف صورة وقت الحفظ
        if ($request->file('image')) {
            $imageName =
                uniqid() . $request->file('image')->getClientOriginalName();
            Image::make($request->file('image'))
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/crimages/' . $imageName));

            $request_data['image'] = $imageName;
        }
        $creative_Work_image->update($request_data);

        toast('Image Added Successfully', 'success')->timerProgressBar();

        return redirect()->route('CreativeWorkImg.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Creative_Work_image  $creative_Work_image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Creative_Work_image $creative_Work_image)
    {
        $creative_Work_image->delete();
        toast('Image Deleted Successfully', 'success')->timerProgressBar();
        return redirect()->route('CreativeWorkImg.index');
    }
}