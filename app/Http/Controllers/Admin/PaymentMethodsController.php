<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PaymentMethods;
use App\Http\Controllers\Controller;

class PaymentMethodsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index(){
        $paymentmethods = PaymentMethods::all();
        return view('admin.paymentMethods')
            -> with('paymentMethods',$paymentmethods)
        ;
    }

    public function save(request $request){
        $paymentmethods = new PaymentMethods;

        $paymentmethods->name = $request -> input('name');
        $paymentmethods->description = $request -> input('description');

        $paymentmethods->save();
        
        Session::flash('statusCode','success');
        return redirect('paymentMethods')->with('status','Data Sucessfully Saved');
    }
    
    public function edit($id){
        $paymentmethods = PaymentMethods::findorFail($id);
        
        return view('admin.paymentMethodsEdit')
            ->with('paymentMethods',$paymentmethods)
        ;
    }

    public function update(request $request,$id){
        $paymentmethods = PaymentMethods::findorFail($id);
        $paymentmethods -> name = $request -> input('name');
        $paymentmethods -> description = $request -> input('description');
        $paymentmethods -> update();

        Session::flash('statusCode','success');
        return redirect('paymentMethods')->with('status','Data Successfully Updated');
    }

    public function delete(Request $request,$id){
        $paymentmethods = PaymentMethods::findorFail($id);
        $paymentmethods ->delete();

        Session::flash('statusCode','success');
        return redirect('paymentMethods')->with('status','Data Successfully deleted');
    }
}
