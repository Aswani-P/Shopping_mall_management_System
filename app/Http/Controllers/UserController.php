<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    
        public function filtering_category(Request $request){
            $filter = $request->post('filter');
            if($filter=='all'){
                $products = Product::all();
                return view('user.userProductView',compact('products'));
            }else{
                $products = Product::where('category',$filter)->get();
                $html = view('user.userProductView',compact('products'));
                return $html;
            }


        }

    
}
