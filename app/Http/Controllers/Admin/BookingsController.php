<?php

namespace App\Http\Controllers\Admin;

use App\User;
use DateTime;
use Carbon\Carbon;
use App\Models\Rooms;
use App\Models\Bookings;
use App\Models\RoomTypes;
use Illuminate\Http\Request;
use App\Models\RoomDiscounts;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        $expNum = $record['id']+1;

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

    public function show(request $request){
        
        $bookings = new Bookings;
        $bookings->bookno = $request -> input('bookno');
        $bookings->room_id = $request -> input('room_id');
        $bookings->roomtype_id = $request -> input('roomtype_id');
        $bookings->status = "APPROVED";
        $bookings->check_in = $request -> input('check_in');
        $bookings->check_out = $request -> input('check_out');
        $bookings->total = $request -> input('total');
        $bookings->discount_id = $request -> input('discount_id');
        $bookings->final_price = $request -> input('final_price');

        //date diff
        $indate =  $request -> input('check_in');
        $outdate = $request -> input('check_out');
        $datetime1 = new DateTime($indate);
        $datetime2 = new DateTime($outdate);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');//now do whatever you like with $days

        //Price
        $prc = DB::table('roomtypes')
        ->where('id', '=',  $request -> input('roomtype_id'))
        ->orderBy('price','asc')
        ->value('price');

        //Discount
        $disc = DB::table('roomdiscounts')
        ->where('id', '=',  $request -> input('discount_id'))
        ->orderBy('value','asc')
        ->value('value');

        //Total Price
        $totalprice = $days*$prc;

        //Final Price 
        $finalprice = $totalprice - ($totalprice*($disc*0.01));

        return view('admin.confirmbookings', compact('finalprice','totalprice','bookings', 'days'));
    }

    public function save(request $request){
        $bookings = new Bookings;
        $userId = Auth::id();

        $bookings->bookno = $request -> input('bookno');
        $bookings->room_id = $request -> input('room_id');
        $bookings->roomtype_id = $request -> input('roomtype_id');
        $bookings->status = "APPROVED";
        $bookings->check_in = $request -> input('check_in');
        $bookings->check_out = $request -> input('check_out');
        $bookings->total = $request -> input('total');
        $bookings->discount_id = $request -> input('discount_id');
        $bookings->final_price = $request -> input('final_price');
        $bookings->userid = $userId;

        $bookings->save();

        Session::flash('statusCode','success');
        return redirect('bookings')->with('status','Data Sucessfully Saved');
    }
    
    public function edit($id){
        $bookings = Bookings::findorFail($id);
        $rooms = Rooms::all();
        $roomtypes = RoomTypes::all();
        $discounts = RoomDiscounts::all();
        return view('admin.bookingsEdit',compact('bookings','roomtypes','rooms','discounts'));
    }

    public function update(request $request,$id){
        $bookings = Bookings::findorFail($id);
        $bookings -> room_id = $request -> input('room_id');
        $bookings -> roomtype_id = $request -> input('roomtype_id');
        $bookings -> check_in = $request -> input('check_in');
        $bookings -> check_out = $request -> input('check_out');
        $bookings -> total = $request -> input('total');
        $bookings -> discount_id = $request -> input('discount_id');
        $bookings -> final_price = $request -> input('final_price');
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


    // Booking Approval Region
    
    public function approval(){
        $bookings = Bookings::all();
        return view('admin.bookingsApproval')
            -> with('bookings',$bookings)
        ;
    }

    public function approve(request $request,$id){
        $bookings = Bookings::findorFail($id);
        $bookings -> status = 'APPROVED';
        $bookings -> update();

        Session::flash('statusCode','success');
        return redirect('bookingapprovals')->with('status','Data Successfully APPROVED');
    }

    public function decline(request $request,$id){
        $bookings = Bookings::findorFail($id);
        $bookings -> status = 'CANCEL';
        $bookings -> update();

        Session::flash('statusCode','success');
        return redirect('bookingapprovals')->with('status','Data Successfully CANCELED');
    }

    public function report(){
        $bookings = Bookings::all();
        $users = new User;
        return view('admin.bookingsreport',compact('users'))-> with('bookings',$bookings,$users,'users');
    }
}
