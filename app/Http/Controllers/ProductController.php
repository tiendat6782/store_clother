<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    //
    public function index(Request $request){
        $products = DB::table('product')->get();
        $products =  Product::all();
        if($request->isMethod('POST') && $request->name) {
            //an vao thi nhay vao trong day
            $products = DB::table('product')
        ->where('name', 'like', '%'.$request->name.'%')
        ->get();
        }


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
    public function editProduct(ProductRequest $request, $id){
        $product = Product::find($id);
        if($request->isMethod("POST")){
            $params = $request->except('_token');
            if($request->hasFile('image') && $request->file('image')->isValid()){
                //có file mới upload lên sẽ link vào để xóa ảnh cũ đi
                //if ktra co file moi dc up up len khonf...neu resultDL ton tai thi day file moi leen...nguoc lai neu khong co file moi day len thif se giu nguyen file anh cu
                $resultDL = Storage::delete('/public/'.$product->image);
                if($resultDL){
                    $params['image'] = uploadFile('hinh',$request->file('image'));
                }else{
                    $params['image'] = $product->image;
                }
            }
            $result = Product::where('id',$id)->update($params);
            if($result){
                Session::flash('success', 'Cập nhật thành công sản phẩm');
                return redirect()->route('route_product_edit',['id'=>$id]);
            }else{
                Session::flash('error', 'Cập nhật thất bại sản phẩm');
            }
        }
        return view('products.edit', compact('product'));
    }

    public function deleteProduct($id){
        Product::where('id',$id)->delete();
        Session::flash('success', 'Xóa thành công sản phẩm có id là: '.$id);
                return redirect()->route('route_product_index');
    }
}
