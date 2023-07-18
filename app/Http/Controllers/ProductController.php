<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    //
    public function index(Request $request){
        $products = DB::table('product')->get();
        return view('products.index', compact('products'));
    }
//     public function addProduct(ProductRequest $request){
//             if($request->isMethod('POST')) {
//                 $params = $request->except('_token');
//                 if($request->hasFile('image') && $request->file('image')->isValid()){
//                     $params['image'] = uploadFile("hinh", $request->file('image'));
//                 }
//                 $products = Product::create($params);

//             if($products->id) {
//                 Session::flash('success', "Thêm mới thành công sản phẩm");
//                 return redirect()->route('route_product_add');
//     }
// }

//             return view('products.add');
//     }

public function addProduct(ProductRequest $request)
    {
        
        //nếu tồn tại request post , khi ng dùng click vào nút thì mới laf post
        if($request->isMethod('POST')) {
            $params = $request->except('_token');
        // neu nhu ton tai file thi post len
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $params['image'] = uploadFile("hinh", $request->file('image'));
        }
            $product = Product::create($params);
            if($product->id) {
                Session::flash('success', 'Thêm mới thành công sản phẩm');
                return redirect()->route('route_product_add');
            }
            // dd(233);
        }
        return view('products.add');
    }
}
