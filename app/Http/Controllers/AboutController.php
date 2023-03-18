<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\UserAbout;
use Illuminate\Http\Request;
use App\Models\FrontSection1;

class AboutController extends Controller
{
    public function about()
    {
        //سحب داتا من اكثر من موديل
        $AllAbt = UserAbout::all();
        $AlldataP = FrontSection1::all(); // هنا حناخد داتا من السكشن الاول من صفحة الولكم - حناخد الصورة
        $AllSkills = Skill::all();
        return view('about', compact('AlldataP', 'AllAbt', 'AllSkills'));
    }
}
