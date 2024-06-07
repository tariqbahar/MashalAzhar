<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\AddCost;
use App\Models\salantytype;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\work;
use App\Models\Mony;
use PDF;
use Carbon\Carbon;
class InsideController extends Controller
{

    

    public function AdminInsidecost() {
        $types =AddCost::all();
        
        $catagory=salantytype::all();
        return view('admin.insidecost',compact('types','catagory'));
       
        
    }//end method
    
    public function StoreType(Request $request ){
        $data=new AddCost;
        $data->name=$request->name;
        $data->types=$request->types;
        $data->details=$request->details;
        $data->quantity=$request->quantity_name;
        $data->cost=$request->cost_name;
        $data->pyment=$request->pyment;
        $data->totalcost=$request->quantity_name*$request->cost_name;
        $data->debate=$request->quantity_name*$request->cost_name-$request->pyment;
        $data->datetime=$request->datetime;
        $data->save();
     
     return redirect()->back();

    }//end method
    public function addtype ()
    {
        return view('admin.addtype');
    }
    public function addnewtype (Request $request)
    {
        $data=new salantytype;
        $data->typename=$request->typename; 
        $data->save();
        return redirect()->back();
    }//end method
    public function costdelete($id)
    {
        $data= AddCost::find($id);
        
        $data->delete();
        
        return redirect()->back();
    }
    public function costedit($id)
    {   $data=AddCost::find($id);
        
        return view ('admin.editcost',compact('data'));
    }
    public function updateCostConfirm (Request  $request , $id)
    {
        $data=AddCost::find($id);
        $data->name=$request->name;
        $data->types=$request->types;
        $data->details=$request->datails;
        $data->quantity=$request->quantity;
        $data->cost=$request->cost;
        $data->pyment=$request->pyment;

        $data->save();
        return redirect()->back();
    }

    public function printPDF($id)
    {
        $data=AddCost::find($id);
        
        $pdf=PDF::loadView('admin.pdf',compact('data'));
        
        return $pdf->download('Cost_details.pdf');

    } 
    public function cost_report (){
        $id=Auth::user()->id;
        $user =User::find($id);
      
        $data=AddCost::get();
        $report=PDF::loadView('admin.costreport',compact('data','user'));
        return $report->download('cost_report.pdf');
    }
    public function adduser()
    {
        return view('admin.adduser');
    }
    public function newuser(Request $request)
    {
        $data= new User;
        $data->name=$request->name;
        $data->email =$request->email;
        $data->password=$request->password;
        $data->phone=$request->phone;
        $data->address=$request->address;
     
 
        $data->save();
        return redirect()->back();
       
    }
    public function weakly_work_report ()
    {
        $startOfWeek = Carbon::now()->startOfWeek(); // Start of the week with time set to 00:00:00
        $endOfWeek = Carbon::now()->endOfWeek(); // End of the week with time set to 23:59:59

        // Retrieve data inserted within the current week
        $weak = work::whereBetween('created_at', [$startOfWeek, $endOfWeek])->get();

        $report=PDF::loadView('admin.weakly_work_report',compact('weak'));
        
        return $report->download('cost_report.pdf');
        
    }
    public function index(){
        return view('admin.insertmony');
    }
    public function adminmony(Request $request){
        
        $data=new Mony;
        $data->name=$request->adminname;
        $data->Amount=$request->amount;
       
 
        $data->save();
        return redirect()->back();

    }
}
