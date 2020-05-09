<?php

namespace App\Http\Controllers\Admin;

use App\Models\RoomPrices;
use App\Models\RoomTypes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class RoomPricesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(){
        $roomprices = RoomPrices::all();
        $roomtypes = RoomTypes::all();
        return view('admin.roomPrices',compact('roomtypes'))
            -> with('roomPrices',$roomprices,'roomtypes',$roomtypes)
        ;
    }

    public function save(request $request){
        $roomprices = new RoomPrices;

        $roomprices->roomtype_id = $request -> input('roomtype_id');
        $roomprices->price = $request -> input('price');

        $roomprices->save();
        
        Session::flash('statusCode','success');
        return redirect('roomPrices')->with('status','Data Sucessfully Saved');
    }
    
    public function edit($id){
        $roomprices = RoomPrices::findorFail($id);
        $roomtypes = RoomTypes::all();
        return view('admin.roompricesEdit',compact('roomprices','roomtypes'));
    }

    public function update(request $request,$id){
        $roomprices = RoomPrices::findorFail($id);
        $roomprices -> roomtype_id = $request -> input('roomtype_id');
        $roomprices -> price = $request -> input('price');
        $roomprices -> update();

        Session::flash('statusCode','success');
        return redirect('roomPrices')->with('status','Data Successfully Updated');
    }

    public function delete(Request $request,$id){
        $roomprices = RoomPrices::findorFail($id);
        $roomprices ->delete();

        Session::flash('statusCode','success');
        return redirect('roomPrices')->with('status','Data Successfully deleted');
    }
}
