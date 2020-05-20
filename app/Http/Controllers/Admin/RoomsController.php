<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rooms;
use App\Models\RoomTypes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class RoomsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(){
        $rooms = Rooms::all();
        $roomtypes = RoomTypes::all();
        return view('admin.rooms',compact('roomtypes'))
            -> with('rooms',$rooms,'roomtypes',$roomtypes)
        ;
    }

    public function report(){
        $rooms = Rooms::all();
        return view('admin.roomsReport')
            -> with('rooms',$rooms)
        ;
    }

    public function save(request $request){
        $rooms = new Rooms;
        //Do Validation First
        request()->validate([
            'roomno' => 'required',
            'floor' => 'required',
            'beds' => 'required',
            'maxcapacity' => 'required',
            'roompicture' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        if (request()->has('roompicture')) {
            $picture = $request->file('roompicture');
            $extension = $picture->getClientOriginalExtension();
            Storage::disk('public_html')->put($picture->getFilename().'.'.$extension,  File::get($picture));
            $rooms->roompicture = $picture->getFilename().'.'.$extension;
        }

        $rooms->roomno = $request -> input('roomno');
        $rooms->roomtype_id = $request -> input('roomtype_id');
        $rooms->floor = $request -> input('floor');
        $rooms->beds = $request -> input('beds');
        $rooms->status = $request -> input('status');
        $rooms->maxcapacity = $request -> input('maxcapacity'); 
        $rooms->remark = $request -> input('remark'); 

        $rooms->save();
        Session::flash('statusCode','success');
        return redirect('rooms')->with('status','Data Sucessfully Saved');
    }
    
    public function edit($id){
        $rooms = Rooms::findorFail($id);
        $roomtypes = RoomTypes::all();
        return view('admin.roomsEdit',compact('rooms','roomtypes'));
    }

    public function update(request $request,$id){
        $rooms = Rooms::findorFail($id);
        $rooms -> roomNo = $request -> input('roomNo');
        $rooms -> roomtype_id = $request -> input('roomtype_id');
        $rooms -> status = $request -> input('status');
        $rooms -> floor = $request -> input('floor');
        $rooms -> beds = $request -> input('beds');
        // region room picture
        if (request()->has('roomPicture')) {
            $picture = $request->file('roomPicture');
            $extension = $picture->getClientOriginalExtension();
            Storage::disk('public_html')->put($picture->getFilename().'.'.$extension,  File::get($picture));
            $rooms->roomPicture = $picture->getFilename().'.'.$extension;
        }
        $rooms -> maxCapacity = $request -> input('maxCapacity');
        $rooms -> remark = $request -> input('remark');
        $rooms -> update();

        Session::flash('statusCode','success');
        return redirect('rooms')->with('status','Data Successfully Updated');
    }

    public function delete(Request $request,$id){
        $rooms = Rooms::findorFail($id);
        $rooms ->delete();

        Session::flash('statusCode','success');
        return redirect('rooms')->with('status','Data Successfully deleted');
    }

    public function show($id)
    {
        // Find the rooms
        $rooms = Rooms::find($id);

        // Get a specific roomtypes
        $roomtypes = Rooms::where('roomtype_id', $id)->get()->all();

        // Return back to rooms details
        return view('admin.roomsDetail', compact('rooms', 'roomtypes'));
    }
}
