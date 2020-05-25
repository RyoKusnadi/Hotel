<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Carbon\Carbon;
use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class DashBoardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(){
        $availablerooms = DB::table('rooms')
        ->where('status', '=', 'AVAILABLE')
        ->orderBy('status','asc')
        ->count('id');

        $usedrooms = DB::table('rooms')
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

        $receivedreservation = DB::table('bookings')
        ->where('status', '=', 'WAITING')
        ->orderBy('status','asc')
        ->count('id');

        $canceledreservation = DB::table('bookings')
        ->where('status', '=', 'CANCEL')
        ->orderBy('status','asc')
        ->count('id');

        return view('admin.dashboard',compact('availablerooms','usedrooms','todaybookings','monthlybookings','receivedreservation','canceledreservation'))
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

    public function updateProfile(){
        $userId = Auth::id();
        $users = User::findorFail($userId);
        return view('admin.updateProfile',compact('users'));
    }

    public function finalUpdate(request $request,$id){
            $users = User::findorFail($id);
            $users -> name = $request -> input('name');
            $users -> phone = $request -> input('phone');
            $users -> email = $request -> input('email');

                if($request -> input('password') == "" && $request ->input('password') == "")
                {
                    $users->save();
                    Session::flash('statusCode','success');
                    return redirect('/dashboard')->with('status','Data Sucessfully Saved');
                }   
                else
                {
                    if($request -> input('password') !=  $request ->input('password_confirmation')){
                        Session::flash('statusCode','error');
                        return redirect('/updateProfileAdmin')->with('status','Password Not Same');
                    }
                    else{
                        $users -> password = Hash::make($request -> input('password'));
                        $users->save();
                        Session::flash('statusCode','success');
                        return redirect('/dashboard')->with('status','Data Sucessfully Saved');
                    }
                }
    }
}
