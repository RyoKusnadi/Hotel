<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\HotelFacilities;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class HotelFacilitiesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index(){
        $hotelFacilities = HotelFacilities::all();
        return view('admin.hotelFacilities')
            -> with('hotelFacilities',$hotelFacilities)
        ;
    }

    public function save(request $request){
        $hotelFacilities = new HotelFacilities;

        $hotelFacilities->name = $request -> input('name');
        $hotelFacilities->price = $request -> input('price');
        $hotelFacilities->description = $request -> input('description');

        $hotelFacilities->save();
        
        Session::flash('statusCode','success');
        return redirect('hotelFacilities')->with('status','Data Sucessfully Saved');
    }
    
    public function edit($id){
        $hotelFacilities = HotelFacilities::findorFail($id);
        
        return view('admin.hotelFacilitiesEdit')
            ->with('hotelFacilities',$hotelFacilities)
        ;
    }

    public function update(request $request,$id){
        $hotelFacilities = HotelFacilities::findorFail($id);
        $hotelFacilities -> name = $request -> input('name');
        $hotelFacilities -> price = $request -> input('price');
        $hotelFacilities -> description = $request -> input('description');
        $hotelFacilities -> update();

        Session::flash('statusCode','success');
        return redirect('hotelFacilities')->with('status','Data Successfully Updated');
    }

    public function delete(Request $request,$id){
        $hotelFacilities = HotelFacilities::findorFail($id);
        $hotelFacilities ->delete();

        Session::flash('statusCode','success');
        return redirect('hotelFacilities')->with('status','Data Successfully deleted');
    }

}
