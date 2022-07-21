<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Inventory;
use App\Models\InventoryProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function billing(){
        $customers = Customer::all();
        $products = Product::all();
       // dd($customers);
        return view('Product.billing',compact('customers','products'));
    }
    public function getProduct($id){
        $pro = Product::  findOrFail($id);
        return response()->json($pro);
    }
    public function inventory(Request $request){
        $inventory = New Inventory();
        $inventory->date=$request->date;
        $inventory->bill_no=$request->bill_no;
        $inventory->customer_id=$request->customer_id;
        $inventory->total_discount=$request->total_discount;
        $inventory->total_amount=$request->total_amount;
        $inventory->due_amount=$request->due_amount;
        $inventory->paid_amount=$request->paid_amount;
        $inventory->save();
        $product = New InventoryProduct();
        $product->inventory_id='01';
        $product->product_id=$request->product_id;
        $product->rate=$request->rate;
        $product->qty=$request->qty;
        $product->discount=$request->discount;
        $product->save();
        return redirect()->back();
    }

}
