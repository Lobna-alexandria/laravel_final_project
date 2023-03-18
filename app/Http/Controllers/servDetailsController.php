<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\UserAbout;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use App\Models\ServeMultiIcon;

class servDetailsController extends Controller //,servDetails $servDetails
{
    public function DService(Request $request)
    {
        $AllImg = MultiImage::all()->sort();
        $AllAbout = UserAbout::all();
        // $AllServs = Service::all();
        // dd($request->servDetails);
        // علشان لو حيفتح صفحة ال سيرفيس بدون فتح الكاردات بالاي دي
        //فمش حياخد اى دي فلا يطلع ايرور
        if ($request->servDetails == 0) {
            // ضغط اللينك من الخارج
            $AllServs = Service::all()
                ->first()
                ->get();
        }

        if ($request->servDetails != 0) {
            // ضغط الينك من كارد معين له اى دي
            $AllServs = Service::where('id', $request->servDetails)->get();
        }
        ///////////////////////////

        $servIcons = ServeMultiIcon::all(); /// social media icons
        return view('front.services-details', get_defined_vars());
    }
}