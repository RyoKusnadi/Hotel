<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rooms;
use Illuminate\Http\Request;
use App\Models\ExtraServices;
use App\Models\HotelFacilities;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ExtraServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(){
        $extraservices = ExtraServices::all();
        $rooms = Rooms::all();
        $hotelFacilities = HotelFacilities::all();
        return view('admin.extraServices',compact('rooms','hotelFacilities'))
            -> with('extraServices',$extraservices,'rooms',$rooms,'hotelFacilities',$hotelFacilities)
        ;
    }

    public function save(request $request){
        $extraservices = new ExtraServices;

        $extraservices->room_id = $request -> input('room_id');
        $extraservices->facility_id = $request -> input('facility_id');
        $extraservices->description = $request -> input('description');

        $extraservices->save();
        
        Session::flash('statusCode','success');
        return redirect('extraServices')->with('status','Data Sucessfully Saved');
    }
    
    public function edit($id){
        $extraservices = ExtraServices::findorFail($id);
        $rooms = Rooms::all();
        $hotelfacilities = HotelFacilities::all();
        return view('admin.extraServicesEdit',compact('extraservices','rooms','hotelfacilities'));
    }

    public function update(request $request,$id){
        $extraservices = ExtraServices::findorFail($id);
        $extraservices -> room_id = $request -> input('room_id');
        $extraservices -> facility_id = $request -> input('facility_id');
        $extraservices -> description = $request -> input('description');
        $extraservices -> update();

        Session::flash('statusCode','success');
        return redirect('extraServices')->with('status','Data Successfully Updated');
    }

    public function delete(Request $request,$id){
        $extraservices = ExtraServices::findorFail($id);
        $extraservices ->delete();

        Session::flash('statusCode','success');
        return redirect('extraServices')->with('status','Data Successfully deleted');
    }
}
