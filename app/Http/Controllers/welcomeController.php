<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Working;
use App\Models\UserAbout;
use App\Models\MultiImage;
use App\Models\CreativeWork;
use Illuminate\Http\Request;
use App\Models\FrontSection1;
use App\Models\Creative_Work_image;
class welcomeController extends Controller
{
    public function showAll()
    {
        $AlldataP = FrontSection1::all();
        $AllAbt = UserAbout::all();
        $MultiImg = MultiImage::all();
        $Allserv = Service::all();
        $Allwork = Working::all();
        $creative = CreativeWork::all();
        $cretWorkImg = Creative_Work_image::all();
        return view('welcome', get_defined_vars());
    }
}

// $creative->CreativeWorkimages->image