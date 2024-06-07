<?php

namespace App\Http\Controllers;
use App\Models\work;
use App\Models\user;
use App\Models\producttype;

use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function AdminWork(){
    

        $types=work::all();
        $catagory=new producttype;
        $catagory=producttype::all();

        return view ('admin.work',compact('types','catagory'));
    }

    public function AddWork(Request $request){
        
        $data=new work;

           $data->workername=$request->workername;
           $data->typeofproduct=$request->typeofproduct;
           $data->unitprice=$request->unitprice;
           $data->workbybox=$request->workbybox;
           $data->pymentbyfactory=$request->pymentbyfactory;
           $data->totalprice=$request->workbybox*$request->unitprice;
           $data->debate=$request->workbybox*$request->unitprice-$request->pymentbyfactory;
           $data->weight=$request->weight;
           $data->date=$request->datetime;
          $data->save();
           
   
        
        $notification = array(
            'message'=>'Sale Product inserted  successfully',
            'alert-type'=>'success'

        );
        return redirect()->back()->with($notification);

   
}
public function workdelete($id)
{
    $data= work::find($id);
    
    $data->delete();
    
    return redirect()->back();
}
}