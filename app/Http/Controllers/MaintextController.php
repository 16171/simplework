<?php
/*
namespace App\Http\Controllers;

use App\Maintext;
use Illuminate\Http\Request;

class MaintextController extends Controller
{
    public function getUrl($url = null){
        $obj = Maintext::where ('url', $url)->first();
   return view('maintext', compact('obj'));
    }
}*/


namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Maintext;

class MaintextController extends Controller
{

    public function getUrl($url = null)
    {

        $obj = Maintext::where('url', $url)->first();

        return view('maintext', compact('obj'));
    }
}
