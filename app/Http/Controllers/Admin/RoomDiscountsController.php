<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\RoomDiscounts;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class RoomDiscountsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index(){
        $roomdiscounts = RoomDiscounts::all();
        return view('admin.roomDiscounts')
            -> with('roomDiscounts',$roomdiscounts)
        ;
    }

    public function save(request $request){
        $roomdiscounts = new RoomDiscounts;

        $roomdiscounts->name = $request -> input('name');
        $roomdiscounts->value = $request -> input('value');
        $roomdiscounts->description = $request -> input('description');
        $roomdiscounts->valid_date = $request -> input('valid_date');
        $roomdiscounts->valid_until = $request -> input('valid_until');

        if($request -> input('valid_date') > $request -> input('valid_until')){
        Session::flash('statusCode','error');
        return redirect('roomDiscounts')->with('status','Valid Date Should be not Smaller Than Valid until');
        }
        else{
            $roomdiscounts->save();
        
            Session::flash('statusCode','success');
            return redirect('roomDiscounts')->with('status','Data Sucessfully Saved');
        }
    }
    
    public function edit($id){
        $roomdiscounts = RoomDiscounts::findorFail($id);
        
        return view('admin.roomDiscountsEdit')
            ->with('roomDiscounts',$roomdiscounts)
        ;
    }

    public function update(request $request,$id){
        $roomdiscounts = RoomDiscounts::findorFail($id);
        $roomdiscounts -> name = $request -> input('name');
        $roomdiscounts -> value = $request -> input('value');
        $roomdiscounts -> description = $request -> input('description');
        $roomdiscounts -> valid_date = $request -> input('valid_date');
        $roomdiscounts -> valid_until = $request -> input('valid_until');

        if($request -> input('valid_date') > $request -> input('valid_until')){
            Session::flash('statusCode','error');
            return redirect('roomDiscounts')->with('status','Valid Date Should be not Smaller Than Valid until');
            }
            else{
                $roomdiscounts -> update();

                Session::flash('statusCode','success');
                return redirect('roomDiscounts')->with('status','Data Successfully Updated');
            }
    }

    public function delete(Request $request,$id){
        $roomdiscounts = RoomDiscounts::findorFail($id);
        $roomdiscounts ->delete();

        Session::flash('statusCode','success');
        return redirect('roomDiscounts')->with('status','Data Successfully deleted');
    }
}
