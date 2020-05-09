<?php

namespace App\Http\Controllers\Admin;

use App\Models\RoomTypes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class RoomTypesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index(){
        $roomtypes = RoomTypes::all();
        return view('admin.roomTypes')
            -> with('roomTypes',$roomtypes)
        ;
    }

    public function save(request $request){
        $roomtypes = new RoomTypes;

        $roomtypes->name = $request -> input('name');
        $roomtypes->description = $request -> input('description');

        $roomtypes->save();
        
        Session::flash('statusCode','success');
        return redirect('roomTypes')->with('status','Data Sucessfully Saved');
    }
    
    public function edit($id){
        $roomtypes = RoomTypes::findorFail($id);
        
        return view('admin.roomTypesEdit')
            ->with('roomtypes',$roomtypes)
        ;
    }

    public function update(request $request,$id){
        $roomtypes = RoomTypes::findorFail($id);
        $roomtypes -> name = $request -> input('name');
        $roomtypes -> description = $request -> input('description');
        $roomtypes -> update();

        Session::flash('statusCode','success');
        return redirect('roomTypes')->with('status','Data Successfully Updated');
    }

    public function delete(Request $request,$id){
        $roomtypes = RoomTypes::findorFail($id);
        $roomtypes ->delete();

        Session::flash('statusCode','success');
        return redirect('roomTypes')->with('status','Data Successfully deleted');
    }

}