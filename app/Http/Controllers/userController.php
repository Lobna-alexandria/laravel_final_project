<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Intervention\Image\Facades\Image;

// use Illuminate\Support\Facades\Role;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Alldata = User::all()->sort();
        return view('AdminDashboard.user.all', compact('Alldata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //هنا عشان نقدر نضيف كل الرولزو البرمشنز اثناء اضافة المستخدم
        $allRoless = Role::all();
        $allPermss = Permission::all();
        return view('AdminDashboard.user.add', get_defined_vars());
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
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'image' => 'image|mimes:png,jpg,jpeg,svg,bmp|max:3048',
        ]);
        // dd($request);
        $request_data = $request->except(
            'password',
            '_token',
            'perms',
            'user_role',
            'image'
        );
        $request_data['password'] = \Hash::make($request->password);
        // لو استقبل ملف صورة وقت الحفظ
        if ($request->file('image')) {
            $imageName =
                uniqid() . $request->file('image')->getClientOriginalName();
            Image::make($request->file('image'))
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/users/' . $imageName));

            $request_data['image'] = $imageName;
        }
        $user1 = User::create($request_data);
        $user1->attachRole($request->user_role);
        $user1->attachPermissions($request->perms);

        // Alert::success('User Added ', 'SuccessFully');
        toast('User Added Successfully', 'success')->timerProgressBar();

        return redirect()->route('user.index');
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
        // $Alldata = User::all();
        $allRoless = Role::all();
        $allPermss = Permission::all();
        return view('AdminDashboard.user.edit', get_defined_vars());

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
        $request->validate([
            'name' => 'required|min:3|max:150',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'required|min:6',
            'image' => 'image|mimes:png,jpg,jpeg,svg,bmp|max:3048',
        ]);
        // dd($request);
        $request_data = $request->except(
            'password',
            '_token',
            'perms',
            'user_role',
            'image'
        );
        if ($request->password != $user->password) {
            $request_data['password'] = \Hash::make($request->password);
        }

        if ($request->file('image')) {
            // حنمسح صورته القديمه
            if (
                $user->image != 'default.png' &&
                public_path('uploads/users/' . $user->image) != ''
            ) {
                unlink(public_path('uploads/users/' . $user->image));
            }
            $imageName =
                uniqid() . $request->file('image')->getClientOriginalName();
            Image::make($request->file('image'))
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/users/' . $imageName));

            $request_data['image'] = $imageName;
        }

        $user->update($request_data);
        $userRole = [];
        array_push($userRole, $request->user_role); // للتحويل ل ارراي
        // foreach ($user->roles as $role) {
        //     $user->detachRole($role->name);
        //     $user->attachRole($request->user_role);
        // }
        //    foreach ($user->roles as $role) {

        //        $user->detach($role->name);
        //        $user->attach($request->user_role);
        //    }

        $user->syncRoles($userRole);
        $user->syncPermissions($request->perms);
        toast('User Updated Successfully', 'success')->timerProgressBar();
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // dd( $user)
        if ($user->image != 'default.png') {
            unlink(public_path('uploads/users/' . $user->image));
        }
        $user->detachRoles($user->Roles);
        $user->detachPermissions($user->permissions);
        $user->delete();
        toast('User Deleted Successfully', 'success')->timerProgressBar();
        return redirect()->route('user.index');
    }
}