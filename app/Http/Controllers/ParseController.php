<?php

namespace App\Http\Controllers;
use App\CatalogOnliner;
use App\Parser\Onliner;

class ParseController extends Controller
{
    public function getIndex(){
        return view('parse');
    }
    public function postProduct(){
$objs = CatalogOnliner::where('status','parse')->get();
foreach ($objs as $one) {
    $parse = new Onliner;
    $parse = getParse($one);


}
    }
}
