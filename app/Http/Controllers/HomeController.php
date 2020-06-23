<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Auth;
use App\Product;
use App\Catalog;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $catalogs = Catalog::all();
        $products = Product::where ('user_id', Auth::user()->id)->orderBy('id','DESC')-> paginate (5);
        return view('home', compact('catalogs','products'));
    }
    public function postIndex(ProductRequest $r)
    {
        $pic=\App::make(\App\Libs\Imag::class)->url($_FILES['picture1']['tmp_name']);
        if($pic) {
            $r['picture'] = $pic;
        }else{
            $r['picture'] = '';
        }
        $r['user_id'] = Auth::user()->id;
        $r['picture'] = '';
        $r['status'] = '';
        Product::create($r->all());
        return redirect()->back();
    }
    public function getDelete ($id = null){
        $obj = Product::find ($id);
        $obj->delete();
        return redirect()->back();
       /*dd($r->all());*/

    }
}
