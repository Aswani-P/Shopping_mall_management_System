<?php

namespace App\Http\Controllers;


use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;
use App\Models\Approve;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function readUser(){
        $user='user';
        $shop='shop';
        $user_get = User::where('usertype', 'user')->orWhere('usertype', $shop)->get();
        return view('admin.adminTableShowUsers',compact('user_get'));
    }

    public function shopTable(){
        $shops = Shop::all();
        return view('admin.shopTable',compact('shops'));
    }

    
    public function updateBtn($id){
        $shops = Shop::find($id);
        return view('admin.updateStatus',compact('shops'));
    }
    public function update(Request $request){
        
        $id = request('id');
        $shops = Shop::find($id);
        $shops->update([
            'status'=>request('status'),
        ]);
        return redirect()->route('showShop')->with('message','Updated the pending status.');
    }
    public function SaveBtn($id){
        $shops = Shop::find($id);
        return view('admin.saveShop',compact('shops'));
    }
    public function saveTo(Request $request){
        $userid = Auth::id();
        $shopname =request('shopname');
        $location = request('location');
        $contact = request('number');
        $status = request('status');
      

        Approve::create([
            'shopname'=>$shopname,
            'location'=>$location,
            'contact'=>$contact,
            'approved'=>$status,
            'userid'=>$userid
            

        ]);

        
        
       
        return redirect()->route('showShop')->with('message','saved the pending status.');
    }

    public function deleteShop($id){
        $id = request('id');
        $shops=Shop::find($id);
        $shops->delete();
        return redirect()->route('showShop')->with('message','The shop is deleted');

    }
    public function userDelete($id){
        $id=request('id');
        $users = User::find($id);
        $users->delete();
        return redirect()->route('userTable')->with('message','deleted the user');
    }
     
    public function viewAllProducts(){
        $products =Product::all();
        return view('admin.showProducts',compact('products'));

    }
   public function deleteadminsideProduct($id)
   {
    $id = request('id');
    $products = Product::find($id);
    $products->delete();
    return view('admin.showProducts',compact('products'));
    
   }

   public function updateAdminProductForm($id){
    $products = Product::find($id);
    return view('admin.adminSideedit',compact('products','id'));

}
   public function updateAdminProduct(){
    $id = request('id');
    $products = Product::find($id);
    $products->update([
        'product_name'=>request('products'),
        'category'=>request('category'),
        'price'=>request('price'),
        'option'=>request('option')
    ]);
    return redirect()->route('AllProduct')->with('message','product details updated');
}

public function pdfDownload(){
    $products = Product::all();
    $pdf = Pdf::loadView('admin.pdf',['products'=>$products]);
    return $pdf->download('products.pdf');
}

}