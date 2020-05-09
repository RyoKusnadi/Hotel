<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashBoardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
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
