<?php

namespace App\Http\Controllers;

use App\Models\Approve;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    public function ViewProductForm($id){
        $approval=Approve::find($id);
        return view('product.productForm',compact('approval'));
    }
    public function viewTableProducts(){
        $approves =Approve::all();
        $products =Product::all();

        $approvedId= Approve::where('userid',Auth::id())->first();
        return view('product.viewProducts',compact('products','approves','approvedId'));
        // return $products;
    }

    public function storeProductForm($id){
        $approveId =Approve::where('userid',Auth::id())->first();
        $product=request('products');
        $category = request('category');
        $price = request('price');
        $option = request('option');

        Product::create([
            'shop_id'=> $id,
            'product_name'=>$product,
            'category'=>$category,
            'price'=>$price,
            'option'=>$option,
            'approved_id' => $approveId -> id,
        ]);

        return redirect()->route('viewProducts')->with('message','Products added successfully..!');

    }
    public function updateProductForm($id){
        $products = Product::find($id);
        return view('product.editProduct',compact('products','id'));

    }
    public function updateProduct(){
        $id = request('id');
        $products = Product::find($id);
        $products->update([
            'product_name'=>request('products'),
            'category'=>request('category'),
            'price'=>request('price'),
            'option'=>request('option')
        ]);
        return redirect()->route('viewProducts')->with('message','product details updated');
    }
    public function deleteProduct($id){
        $products = Product::find($id);
        $products->delete();
        return redirect()->route('viewProducts')->with('message','Deleted the products');
    }
    
}
