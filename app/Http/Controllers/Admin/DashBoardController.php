<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Carbon\Carbon;
use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(){
        $availablerooms = DB::table('Rooms')
        ->where('status', '=', 'AVAILABLE')
        ->orderBy('status','asc')
        ->count('id');

        $usedrooms = DB::table('Rooms')
        ->where('status', '=', 'USED')
        ->orderBy('status','asc')
        ->count('id');

        $todaybookings = DB::table('bookings')
        ->where('created_at', '>=', Carbon::today())
        ->count('id');

        $monthlybookings = DB::table('bookings')
        ->whereYear('created_at', Carbon::now()->year)
        ->whereMonth('created_at', Carbon::now()->month)
        ->count('id');

        return view('admin.dashboard',compact('availablerooms','usedrooms','todaybookings','monthlybookings'))
            -> with('dashboard');
    }

    public function usersRoles()
    {
        $users = User::all();
        return view('admin.usersRoles')->with('users',$users);
    }

    public function usersRolesEdit(Request $request, $id)
    {
        $users = user::findorFail($id);
        return view('admin.editUR')->with('users',$users);
    }
    
    public function urUpdate(Request $request,$id){
        $users = user::findorFail($id);
        $users ->name = $request->input('username');
        $users ->user_type = $request->input('usertype');
        $users ->update();

        return redirect('/usersRole')->with('status','Your Data Is Updated');
    }

    public function deleteUR(Request $request,$id){
        $users = user::findorFail($id);
        $users ->delete();

        return redirect('/usersRole')->with('status','Your Data Is Deleted');
    }
}
