<?php

namespace App\Http\Controllers;

use Validator;
use Redirect;
use View;
use Session;
use Illuminate\Http\Request;
use App\Saving;
use App\Loan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoansController extends Controller
{
    /**
     * Instantiate a new controller instance
     *
     * @return  void
     */

    public function __construct()
    {
        $this->middleware('auth')->only('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'loan'=>'required'
        );
        
        $validator = Validator::make($request->all(), $rules);
        
        if($validator ->fails()){
            return Redirect::to('dashboard')->withErrors($validator)->withInput();
        }
        $totalsavings = Saving::where('user_email', Auth::User()->email)->sum('saving');
        $total = DB::table('savings')->sum('saving');
        $totalloans = DB::table('loans')->get();
        $loans = DB::table('loans')->where('repayment','0')->sum('loan');
        $repayedloans = DB::table('loans')->where('repayment','1')->sum('loan');
        $loaneligibility = Loan::where('user_email',Auth::User()->email)->value('repayment');

        if($request->get('loan')<($totalsavings*2)){
            if($request->get('loan')<$total-$loans){
                $loan = new Loan;
                $loan->loan = $request->get('loan');
                $loan->user_email = Auth::User()->email;
                $loan->save();
                Session::flash('message', 'Loan saved to database successfully');
                return Redirect::to('dashboard')->with('message','loan taken successfully');
            }else{
                echo "Loan exceeds total savings in account";
            }
        }else{
            echo "Loan exceeds your total savings multiplied twice";
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $loan = Loan::find($id);
        $loan->repayment = 1;
        $loan->save();
          
        Session::flash('message','loan repayed succefully');
        return Redirect::to('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
