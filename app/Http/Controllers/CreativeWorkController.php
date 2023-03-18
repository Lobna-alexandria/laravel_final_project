<?php

namespace App\Http\Controllers;

use App\Models\CreativeWork;
use Illuminate\Http\Request;

class CreativeWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Alldata = CreativeWork::paginate(5);
        return view('AdminDashboard.CreativeWork.all', compact('Alldata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminDashboard.CreativeWork.add');
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
            'name' => 'required|min:3|max:150',
            'desc' => 'required|min:6',
        ]);
        $creativeWork = CreativeWork::create($request->all());
        toast('CreativeWork Added Successfully', 'success')->timerProgressBar();

        return redirect()->route('CreativeWork.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CreativeWork  $creativeWork
     * @return \Illuminate\Http\Response
     */
    public function show(CreativeWork $creativeWork)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CreativeWork  $creativeWork
     * @return \Illuminate\Http\Response
     */
    public function edit(CreativeWork $creativeWork)
    {
        return view(
            'AdminDashboard.CreativeWork.edit',
            compact('creativeWork')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CreativeWork  $creativeWork
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CreativeWork $creativeWork)
    {
        $request->validate([
            'name' => 'required|min:3|max:150',
            'desc' => 'required|min:6',
        ]);
        // $creativeWork = CreativeWork::update($request->all());
        $creativeWork->update($request->all());
        toast('CreativeWork Added Successfully', 'success')->timerProgressBar();

        return redirect()->route('CreativeWork.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CreativeWork  $creativeWork
     * @return \Illuminate\Http\Response
     */
    public function destroy(CreativeWork $creativeWork)
    {
        //
    }
}