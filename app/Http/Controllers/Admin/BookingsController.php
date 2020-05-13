<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rooms;
use App\Models\Bookings;
use App\Models\RoomTypes;
use Illuminate\Http\Request;
use App\Models\RoomDiscounts;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class BookingsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(){
        //get last record
        $record = Bookings::latest()->first();
        $expNum = $record['id'];

        //check first day in a year
        if ( date('l',strtotime(date('Y-01-01'))) ){
        $nextInvoiceNumber = 'INV'.date('Y').'-'.$expNum;
        }

        $roomdiscounts = RoomDiscounts::all();
        $bookings = Bookings::all();
        $roomtypes = RoomTypes::all();
        $rooms = Rooms::all();
        return view('admin.bookings',compact('bookings','roomtypes','nextInvoiceNumber','rooms','roomdiscounts'))
            -> with('bookings',$bookings,'rooms',$rooms,'roomtypes',$roomtypes,'roomdiscounts',$roomdiscounts,'nextInvoiceNumber',$nextInvoiceNumber)
        ;
    }

    public function save(request $request){
        $bookings = new Bookings;
        $bookings->bookno = $request -> input('bookno');
        $bookings->room_id = $request -> input('room_id');
        $bookings->roomtype_id = $request -> input('roomtype_id');
        $bookings->status = $request -> input('status');
        $bookings->check_in = $request -> input('check_in');
        $bookings->check_out = $request -> input('check_out');
        $bookings->total = $request -> input('total');
        $bookings->discount_id = $request -> input('discount_id');
        $bookings->final_price = $request -> input('final_price');

        $bookings->save();
        
        Session::flash('statusCode','success');
        return redirect('bookings')->with('status','Data Sucessfully Saved');
    }
    
    public function edit($id){
        $bookings = Bookings::findorFail($id);
        $roomtypes = Bookings::all();
        return view('admin.bookingsEdit',compact('bookings','roomtypes'));
    }

    public function update(request $request,$id){
        $bookings = Bookings::findorFail($id);
        $bookings -> roomtype_id = $request -> input('roomtype_id');
        $bookings -> price = $request -> input('price');
        $bookings -> update();

        Session::flash('statusCode','success');
        return redirect('bookings')->with('status','Data Successfully Updated');
    }

    public function delete(Request $request,$id){
        $bookings = Bookings::findorFail($id);
        $bookings ->delete();

        Session::flash('statusCode','success');
        return redirect('bookings')->with('status','Data Successfully deleted');
    }
}
