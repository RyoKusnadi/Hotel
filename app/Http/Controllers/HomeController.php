<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\Bookings;
use App\Models\RoomTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Rooms;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     */
    public function index(){
        $roomtypes = RoomTypes::all();
        return view('client.main',compact('roomtypes'))
        ->with('roomtypes',$roomtypes)
        ;
    }

    public function show(request $request){
        $islogin = Auth::check();
        if($islogin == false){
            return redirect('login');
        }
        else{ 
        //get last record
         $record = Bookings::latest()->first();
         $expNum = $record['id']+1;
 
         //check first day in a year
         if ( date('l',strtotime(date('Y-01-01'))) ){
         $nextInvoiceNumber = 'INV'.date('Y').'-'.$expNum;
         }

        $bookings = new Bookings;
        $bookings->bookno = $nextInvoiceNumber;
        $bookings->bookby = $request -> input('bookby');
        $bookings->bookno = $request -> input('bookno');
        $bookings->roomtype_id = $request -> input('roomtype_id');
        $bookings->check_in = $request -> input('check_in');
        $bookings->check_out = $request -> input('check_out');

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
         
        //RoomPicture
        $rp = DB::table('rooms')
        ->where('roomtype_id', '=',  $request -> input('roomtype_id'))
        ->orderBy('roomPicture','asc')
        ->value('roomPicture');

        //Discount
        $disc = DB::table('roomdiscounts')
        ->where('id', '=',  $request -> input('discount_id'))
        ->orderBy('value','asc')
        ->value('value');

        //Total Price
        $totalprice = $days*$prc;

        //Final Price 
        $finalprice = $totalprice - ($totalprice*($disc*0.01));

        return view('client.confirmclients', compact('finalprice','nextInvoiceNumber','totalprice','bookings', 'days','rp'));
    }}
    
    public function save(request $request){
        //get last record
        $record = Bookings::latest()->first();
        $expNum = $record['id']+1;

        //check first day in a year
        if ( date('l',strtotime(date('Y-01-01'))) ){
        $nextInvoiceNumber = 'INV'.date('Y').'-'.$expNum;
        }

        $bookings = new Bookings;
        $userId = Auth::id();

        $bookings->bookno = $nextInvoiceNumber;
        $bookings->roomtype_id = $request -> input('roomtype_id');
        $bookings->status = "WAITING";
        $bookings->check_in = $request -> input('check_in');
        $bookings->check_out = $request -> input('check_out');
        $bookings->total = $request -> input('total');
        $bookings->discount_id = $request -> input('discount_id');
        $bookings->final_price = $request -> input('final_price');
        $bookings->userid = $userId;

        $bookings->save();

        Session::flash('statusCode','success');
        return redirect('home')->with('status','Data Sucessfully Saved');
    }

    public function mybooking(){
        $userId = Auth::id();
        $bookings = Bookings::where('userid', '=', $userId)->get();
        $rooms = Rooms::all();
        $roomtypes = RoomTypes::all();
        return view('client.mybooking',compact('bookings','roomtypes','rooms'));
    }
}
