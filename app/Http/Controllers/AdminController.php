<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\product;
use App\Models\work;
use App\Models\AddSell;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class AdminController extends Controller
{
    public function AdminDashboard(){

        return view('admin.index');
    } //end function

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }//End method
    public function AdminLogin (){
        return view('admin.admin_login');
    }//end method

    public function AdminProfile () {
        $id=Auth::user()->id;
        $profileData =User::find($id);
        return view('admin.admin_profile_view',compact('profileData'));
    }//end method

    public function AdminProfileStore   (Request $request){
        $id=Auth::user()->id;
        $data = User::find($id);
            $data->username= $request->username;
            $data->name=$request->name;
            $data->email=$request->email;
            $data->phone=$request->phone;
            $data->address=$request->address;
            
            if ($request->file('photo')){
                $file=$request->file('photo');
                @unlink(public_path('upload/admin_images/'.$data->photo));
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/admin_images'),$filename);
                $data['photo']=$filename;
            }
            $data->save();
            $notification = array(
                'message'=>'admin profile is successfully updated',
                'alert-type'=>'success' 
            );
            return redirect()->back()->with($notification);

    }//  end method
    public function AdminChangePassword(){
        $id=Auth::user()->id;
        $profileData =User::find($id);
        return view ('admin.admin_change_password',compact('profileData'));

    }//  end method
    public function AdminUpdatePassword(Request $request){
            $request->validate([
                'old_password'=>'required',
                'new_password'=>'required|confirmed'

        ]);//match old password
        if(!Hash::check($request->old_password,auth::user()->password)){
            $notification = array(
                'message'=>'Old password Does not matched',
                'alert-type'=>'error'

            );
            return back()->with($notification);

        }//update the New password
        User::whereId(auth()->user()->id)->update([
            'password' =>Hash::make($request->new_password)

        ]);
        $notification = array(
            'message'=>'Password changed successfully',
            'alert-type'=>'success'

        );
        return back()->with($notification);


    }//end method
   
    public function AdminSales (){
        return view('admin.sales');
    }
    public function AdminDaily (){
        return view('admin.daily');
    }


    public function AdminWeakly (){
         $startOfWeek = Carbon::now()->startOfWeek(); // Start of the week with time set to 00:00:00
        $endOfWeek = Carbon::now()->endOfWeek(); // End of the week with time set to 23:59:59

        // Retrieve data inserted within the current week
        $data = work::whereBetween('created_at', [$startOfWeek, $endOfWeek])->get();
    return view('admin.weakly',compact('data'));  }


    public function AdminMonthly (){
// Get the start and end of the current month
$startOfMonth = Carbon::now()->startOfMonth(); // Start of the month with time set to 00:00:00
$endOfMonth = Carbon::now()->endOfMonth(); // End of the month with time set to 23:59:59
// Retrieve data inserted within the current month
$data = work::whereBetween('created_at', [$startOfMonth, $endOfMonth])->get();
return view('admin.monthly', compact('data'));
    }
   
    public function Adminsalanty (){
        
        
        
        
        $data=work::where('typeofproduct','Salanty')->get();
     

        
        
        
        return view('admin.salanty',compact('data'));

    }public function adminmencha()
    {
        $data = work::where('typeofproduct', 'Mencha')->get();

        return view('admin.mencha',compact('data'));
    }



    public function AdminLoans (){
        return view('admin.loans');
    }

    


}
