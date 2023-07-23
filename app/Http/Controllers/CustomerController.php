<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class CustomerController extends Controller

{
    //
    public function index(Request $request){
        $customers = DB::table('customer')->get();
        return view('customer.index',compact('customers'));
    }
    public function addCustomer(CustomerRequest $request){
        if($request->isMethod('POST')){
            $customer = Customer::create($request->except('_token'));
            if($customer->id){
                Session::flash('success','Thêm mới Customer thành công....');
                return redirect()->route('route_customer_add');
            }
        }
        return view('customer.add');
    }
    public function editCustomer(CustomerRequest $request, $id){
        $customer = Customer::find($id);
        if($request->isMethod('POST')){
            $result = Customer::where('id',$id)->update($request->except('_token'));
            if($result){
                Session::flash('success','Update Customer thành công....');
                return redirect()->route('route_customer_edit',['id'=>$id]);
            }else{
                Session::flash('error','Update Customer không thành công....');
            }
        }
        return view('customer.edit', compact('customer'));
    }
}
