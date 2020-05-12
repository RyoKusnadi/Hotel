<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PaymentMethods;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

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
        $paymentmethods->book_Id = $request -> input('book_Id');
        $paymentmethods->paymentAmount = $request -> input('paymentAmount');
        $paymentmethods->paymentDate = $request -> input('paymentDate');
        $paymentmethods->payment_categories = $request -> input('payment_categories');
        $paymentmethods->card_number = $request -> input('card_number');
        $paymentmethods->card_holdername = $request -> input('card_holdername');
        $paymentmethods->remarks = $request -> input('remarks');
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
        $paymentmethods->book_Id = $request -> input('book_Id');
        $paymentmethods->paymentAmount = $request -> input('paymentAmount');
        $paymentmethods->paymentDate = $request -> input('paymentDate');
        $paymentmethods->payment_categories = $request -> input('payment_categories');
        $paymentmethods->card_number = $request -> input('card_number');
        $paymentmethods->card_holdername = $request -> input('card_holdername');
        $paymentmethods->remarks = $request -> input('remarks');
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
