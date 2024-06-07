<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function AgentDashboard(){

        return  view('user.user_dashboard');
    }//end function
}
