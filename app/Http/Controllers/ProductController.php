<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;


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
    public function trangChu(){
        $products = DB::table('product')->get();
        $products =  Product::all();
        return view('shopclother.product', compact('products'));
    }
    public function addToCart($id){
        // session()->flush('cart');
        // print_r(session()->get('cart')); 
        // dd('end');
        
    $products = Product::find($id);
    $cart = session()->get('cart');
    if(isset($cart[$id])){
        $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
    }else{
        $cart[$id] = [
            'name' => $products->name,
            'price' => $products->price,
            'quantity' =>1,
        ];
    }
    session()->put('cart',$cart);
    // dd(session()->get('cart',$cart));   
    // echo "<pre>";
    // print_r(session()->get('cart'));  
    return response()->json([
        'status' => 200,
        'message' => 'success'
    ],200);
    }
    public function showCart(){
        // echo "<pre>";
    // print_r(session()->get('cart')); 
    $carts = session()->get('cart');
    return view('shopclother.cart', compact('carts'));
    }
    public function updateCart(Request $request){
        // dd($request->all());
        if($request->id && $request->quantity){
            $carts = session()->get('cart');
            $carts[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            
            $cart_show = view('shopclother.compow.cart_show', compact('carts'))->render();
           
            return response()->json([
                'status' => 200,
                'cart_show' => $cart_show
            ],200);
        }
    }
    public function deleteCart(Request $request){
        if($request->id){
            $carts = session()->get('cart');
            unset($carts[$request->id]);
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            
            $cart_show = view('shopclother.compow.cart_show', compact('carts'))->render();
           
            return response()->json([
                'status' => 200,
                'cart_show' => $cart_show
            ],200);
        }
    }
    // public function giohang(){
    //     $products = DB::table('product')->get();
    //     $products =  Product::all();
    //     return view('shopclother.giohang', compact('products'));
    // }
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
        $categories = Category::all();
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
        return view('products.add',compact('categories'));
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
