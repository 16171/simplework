<?php

namespace App\Http\Controllers;

use App\Catalog;
class BestController extends Controller
{
    public function getAll(){
        $catalogs = Catalog::all();
        return view('best', compact('catalogs'));
    }
}
