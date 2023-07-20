<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\DB;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
class CategoryController extends Controller
{
    //
    public function index(Request $request){
        $categories = DB::table('category')->get();
        $categories = Category::all();
        return view('category.index', compact('categories'));
    } 

    public function addCategory(CategoryRequest $request){
        if($request->isMethod('POST')){
            // $params = $request->except('_token');
            $category = Category::create($request->except('_token'));
            if($category->id){
                Session::flash('success',"Thêm mới thành công danh mục");
                return redirect()->route('route_category_add');
            }
        }
        return view('category.add');
    }
    public function editCategory(CategoryRequest $request, $id){
        $category = Category::find($id);
        if($request->isMethod('POST')){
            $result = Category::where('id',$id)->update($request->except('_token'));
            if($result){
                Session::flash('success', 'Cập nhật thành công Category');
                return redirect()->route('route_category_edit',['id'=>$id]);
            }else{
                Session::flash('error', 'Cập nhật thất bại Category');
            }
        }
        return view('category.edit', compact('category'));
    }
    
    public function deleteCategory($id){
        Category::where('id',$id)->delete();
        Session::flash('error', 'Xóa thành công Category id là: '.$id);
        return redirect()->route('route_category_index');
    }
}
