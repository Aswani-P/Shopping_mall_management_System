<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Approve;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ShopController extends Controller
{
    // public function Approval(){
    //     $current_id = Auth::id();
    //     $users = User::find($current_id);
    //     $users->update([
    //         'Status_change'=> 'yes'
    //     ]);
    //     return redirect()->back();
    // }






    public function registerForm(){
        return view('shop.shopRegistrationForm');
    }
    public function register(Request $request)
    {
        $userid=Auth::id();
        $shopname = request('shop');
        $location =request('location');
        $contact =request('contact');
        

        Shop::create([
            'user_id'=>$userid,
            'shop_name'=>$shopname,
            'location'=>$location,
            'contact'=>$contact,
            'isSent'=>1
        ]);
        return redirect()->route('shopHome');
        
    }

    public function afterReg(){
        return view('shop.shopAfterRegister');
    }
    public function viewAprovedTable(){
        $user=Auth::id();
        $aproves = Approve::all();
        
        return view('shop.shopAfterRegister',compact('aproves','user'));

    }
    public function shopHomeview(){
        return view('shop.shopHome');
    }


}
