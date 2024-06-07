<?php

namespace App\Http\Controllers;
use App\Models\AddSell;
use App\Models\User;
// use App\Models\salantytype;
use App\Models\producttype;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function AdminSale() {
        $buyersname=User::all();

        $type=AddSell::all();
        

        
        $catagory= producttype::all();

        return view('admin.sales',compact('type','catagory','buyersname'));
    }
        
    public function StoreSell(Request $request)
    {
            // $request->validate([
            //        'buyer_name'=>'required',
            //        'detaile'=>'required',
            //        'product_type'=>'required',
            //        'weight'=>'required',
            //        'unit_price'=>'required',
                   
            //        'pyment'=>'required',
            //        'datetime'=>'required',
                   
                   
       
            // ]);
            // AddSell::insert([
            //    'buyer_name'=>$request->buyer_name,
            //    'detaile'=>$request->detaile,
            //    'product_type'=>$request->product_type,
            //    'weight'=>$request->weight,
            //    'unit_price'=>$request->unit_price,
            //    'totalprice'=>$request->weight*$request->unit_price,
            //    'debate'=>$request->weight*$request->unit_price-$request->pyment,
            //    'pyment'=>$request->pyment,
            //    'datetime'=>$request->datetime,
              
               
       
            // ]);
            $costdata=new AddSell;
            $costdata->buyer_name=$request->buyer_name;
            $costdata->detaile=$request->detaile;
            $costdata->product_type=$request->product_type;
            $costdata->weight=$request->weight;
            $costdata->unit_price=$request->unit_price;
            $costdata->totalprice=$request->weight*$request->unit_price;
            $costdata->debate=$request->weight*$request->unit_price-$request->pyment;
            $costdata->pyment=$request->pyment;
            $costdata->datetime=$request->datetime;
            $costdata->save();

            
            $notification = array(
                'message'=>'Sale Product inserted  successfully',
                'alert-type'=>'success'
    
            );
            return redirect()->route('admin.sales')->with($notification);
       
      
     }//end method
     public function ProductType ()
     {
        return view('/admin.addproducttype');
     }

     public function AddProductType (Request $request)
     {
        $data=new producttype;
        $data->producttype=$request->typename;
        $data->save();
        return redirect()->back();
     }
     public function saleedit($id)
    {   $data=AddSell::find($id);
        
        return view ('admin.editsale',compact('data'));
    }
    public function saledelete($id)
    {
        $data= AddSell::find($id);
        
        $data->delete();
        
        return redirect()->back();
    }
    public function updatesaleConfirm (Request  $request , $id)
    {
        $data=AddSell::find($id);
        $data->name=$request->buyer_name;
        $data->types=$request->types;
        $data->details=$request->datails;
        $data->quantity=$request->quantity;
        $data->cost=$request->cost;
        $data->pyment=$request->pyment;

        $data->save();
        return redirect()->back();
    }

    public function buyerinfo($id) {
        $data =AddSell::find($id);
        
        
        return view('admin.buyerinfo',compact('data'));
       
        
    }//end method
}

