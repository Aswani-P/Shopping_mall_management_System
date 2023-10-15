<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        
        if(Auth::id()){
           
            $usertype = Auth()->user()->usertype;
            if($usertype=='user'){
                $categories = Product::distinct()->pluck('category');
                // return $categories;
                $products = Product::all();
                return view('dashboard',compact('products','categories'));
                
            }
            else if($usertype =='admin'){
                return view('admin.adminhome');
            }
            else if($usertype=='shop'){
                $shop=Shop::where('user_id',Auth::id())->first();
                return view('shop.shopHome',compact('shop'));
                // return $shop==null;
            }
        }
    }
}
