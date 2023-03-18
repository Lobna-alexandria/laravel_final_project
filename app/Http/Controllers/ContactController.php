<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Service;
use App\Models\UserAbout;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use App\Models\FrontSection1;

class ContactController extends Controller
{
    public function contact()
    {
        //سحب داتا من اكثر من موديل
        $AllAbt = UserAbout::all();
        $AlldataP = FrontSection1::all(); // هنا حناخد داتا من السكشن الاول من صفحة الولكم - حناخد الصورة
        $Alldata = Service::all();
        $MultiImg = MultiImage::all();
        return view('contact', get_defined_vars());
    }
}