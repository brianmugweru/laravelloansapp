<?php

namespace App\Http\Controllers;
use Validator;
use Redirect;
use View;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Saving;
use App\User;
use App\Loan;


class AuthController extends Controller
{
  /*
   * Check authentication for dashboard template
   *
   */
    public function __construct()
    {
        $this->middleware('auth')->only('dashboard');
    }
  /**
   * Dashboard with both savings and loans
   *
   */
  public function dashboard()
  {
      $loantaken = Loan::where('user_email', Auth::User()->email)->value('repayment');
      $totalloans = Loan::where('user_email', Auth::User()->email)->get();
      $loans = Loan::where('user_email', Auth::User()->email)->where('repayment',0)->get();
      $savings = Saving::where('user_email', Auth::User()->email)->get();
      $totalsavings = Saving::where('user_email', Auth::User()->email)->sum('saving');
      $loaneligibility = Loan::where('repayment',1)->where('user_email', Auth::User()->email)->value('repayment');
      Return View('dashboard')->with('savings',$savings)->with('loans',$loans)->with('total', $totalsavings)->with('loaneligibility',$loantaken)->with('totalloans',$totalloans);
  }
  /**
   * post users after registering for appication
   *
   */
  public function register(Request $request)
  {
      $rules = array(
          'fname'=>'required',
          'mname'=>'required',
          'lname'=>'required',
          'email'=>'required',
          'address'=>'required',
          'tel'=>'required',
          'idnumber'=>'required',
          'password'=>'required',
          'dob'=>'required',
          'residence'=>'required',
          'marital'=>'required'
      );

      $validator = Validator::make($request->all(),$rules); 

      if($validator->fails()){
          return redirect::to('signup')->withErrors($validator)->withInput();
      }

      $data = $request->only('fname','lname','mname','email','address','tel','idnumber','password','dob', 'marital', 'residence','retypepass');    

      $data['password'] = bcrypt($data['password']);
      $user = User::create($data);
      if($user){
        \Auth::login($user);
        return redirect('dashboard')->with('status','authenticated successfully');
      }
      return back()->withinput();
  }

  public function authenticate(Request $request)
  {
      $this -> validate($request, User::$validation_rules);
      $data = $request->only('email','password');
      if(Auth::attempt($data)){
          return redirect()->intended('dashboard');
      }
      return back()->withInput()->withErrors(['email'=>'Username and password probably wrong']);

  }

  public function create(){
      return view('login');
  }

  public function logout(){
      \Auth::logout();
      return redirect('login');
  }

}
