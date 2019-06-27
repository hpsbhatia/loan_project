<?php

namespace App\Http\Controllers;

use App\Depositor;
use App\DepositPackage;
use App\GeneralSetting;
use App\LoanPackage;
use App\Loner;
use App\Schedule;
use App\Staff;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class StaffController extends Controller
{
    public function __construct()
    {
        $data = [];
        $this->middleware('auth:staff');
        $general_all = GeneralSetting::first();
        $this->site_title = $general_all->title;
        $this->gen_phone = $general_all->number;
        $this->gen_email = $general_all->email;
        $this->site_color = $general_all->color;

    }

    public function getDashboard()
    {

        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Staff Dashboard";
        $data['total_loaner'] = Loner::all()->count();
        $data['total_depositor'] = Depositor::all()->count();
        return view('staff.dashboard',$data);
    }
    public function getChangePass()
    {
        $data['page_title'] = "Change Password";
        $general_all = GeneralSetting::first();
        $data['site_title'] = $general_all->title;
        return view('auth.staff-change-pass',$data);
    }
    public function postChangePass(Request $request)
    {
        $this->validate($request, [
            'current_password' =>'required',
            'password' => 'required|min:5|confirmed'
        ]);

        try {
            $c_password = Auth::guard('staff')->user()->password;
            $c_id = Auth::guard('staff')->user()->id;

            $user = Staff::findOrFail($c_id);

            if(Hash::check($request->current_password, $c_password)){

                $password = Hash::make($request->password);
                $user->password = $password;
                $user->save();
                session()->flash('message', 'Password Changes Successfully.');
                Session::flash('type', 'success');
                return redirect()->back();
            }else{
                session()->flash('message', 'Password Not Match');
                Session::flash('type', 'danger');
                return redirect()->back();
            }

        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }

    }
    public function createLend()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Create New Loaner";
        $data['package'] = LoanPackage::all();
        return view('staff.lend-create',$data);
    }
    public function calcLend()
    {
        
        return view('dashboard.lend-calculate');
    }
    public function storeLend(Request $request)
    {

        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'email_name' => 'required',
            'phone_number' => 'required',
            'present_address' => 'required',
            'permanent_address' => 'required',
            'emergency_name' => 'required',
            'emergency_phone' => 'required',
            'emergency_relationship' => 'required',
            'emergency_address' => 'required',
            'loaner_image' => 'required|mimes:png,jpg,jpeg',
            'nid_image' => 'required|mimes:png,jpg,jpeg',
            'package_id' => 'required',
            'staff_id' => 'required',
        ]);
        $loner = Input::except('_token','_method');
        try {
            if($request->hasFile('loaner_image')){
                $image = $request->file('loaner_image');
                $filename1 = time()."h1".'.'.$image->getClientOriginalExtension();
                $location = 'images/' . $filename1;
                Image::make($image)->resize(415,530)->save($location);
                $loner['loaner_image'] = $filename1;
            }
            if($request->hasFile('nid_image')){
                $image = $request->file('nid_image');
                $filename2 = time()."h2".'.'.$image->getClientOriginalExtension();
                $location = 'images/' . $filename2;
                Image::make($image)->save($location);
                $loner['nid_image'] = $filename2;
            }
            $loner['loaner_number'] = strtoupper(rand(100,999).uniqid().rand(100,999));

            $lon = Loner::create($loner);
            session()->flash('message', 'Loner Created Successfully.');
            Session::flash('type', 'success');
            return redirect()->route('staff-loner-details',$lon->id);
        } catch (\PDOException $e) {
            session()->flash('message', "Some Problem Occurs, Please Try Again!");
            Session::flash('type', 'danger');
            return redirect()->back();
        }

    }
    public function detailsLend($id)
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Loan Details";
        $data['details'] = Loner::findOrfail($id);
        return view('staff.lend-details',$data);
    }
    public function editLend($id)
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Edit Loan Details";
        $data['package'] = LoanPackage::all();
        $data['details'] = Loner::findOrFail($id);
        return view('staff.lend-edit',$data);
    }
    public function updateLend(Request $request,$id)
    {
        $lo = Loner::findOrFail($id);
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'email_name' => 'required',
            'phone_number' => 'required',
            'present_address' => 'required',
            'permanent_address' => 'required',
            'emergency_name' => 'required',
            'emergency_phone' => 'required',
            'emergency_relationship' => 'required',
            'emergency_address' => 'required',
            'loaner_image' => 'mimes:png,jpg,jpeg',
            'nid_image' => 'mimes:png,jpg,jpeg',
            'package_id' => 'required',
            'staff_id' => 'required',
        ]);
        $loner = Input::except('_token','_method');
        try {
            if($request->hasFile('loaner_image')){
                $image = $request->file('loaner_image');
                $filename1 = time()."h1".'.'.$image->getClientOriginalExtension();
                $location = 'images/' . $filename1;
                Image::make($image)->resize(415,530)->save($location);
                $loner['loaner_image'] = $filename1;
            }
            if($request->hasFile('nid_image')){
                $image = $request->file('nid_image');
                $filename2 = time()."h2".'.'.$image->getClientOriginalExtension();
                $location = 'images/' . $filename2;
                Image::make($image)->save($location);
                $loner['nid_image'] = $filename2;
            }

            $lo->fill($loner)->save();
            session()->flash('message', 'Loner Updated Successfully.');
            Session::flash('type', 'success');
            return redirect()->route('staff-loner-details',$id);
        } catch (\PDOException $e) {
            session()->flash('message', "Some Problem Occurs, Please Try Again!");
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function confirmLoner(Request $request)
    {
        $this->validate($request,[
            'id' => 'required'
        ]);
        $loner = Loner::findOrFail($request->id);

        $now = Carbon::today();
        for ($i= 1; $i<= $loner->package->installment ; $i++) {
            $sch['loner_id'] = $loner->id;
            $sch['loner_number'] = $loner->loaner_number;
            $sch['date'] = date('d-m-Y',strtotime($now->addWeek()));
            $sch['type'] = 1;
            Schedule::create($sch);
        }
        $data['schedule'] = Schedule::whereLoner_id($loner->id)->whereLoner_number($loner->loaner_number)->paginate(1000);
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Loan Schedule";
        return view('staff.loan-schedule',$data);
    }
    public function showLend()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "All Loaner Details";
        $data['loner'] = Loner::whereStaff_id(Auth::guard('staff')->user()->id)->orderBy('id','desc')->paginate(1000);
        return view('staff.lender-show',$data);
    }
    public function scheduleLoanShow($id)
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "$id Loan Schedule";
        $data['schedule'] = Schedule::whereLoner_number($id)->paginate(1000);
        return view('staff.loan-schedule-show',$data);
    }
    public function createDepositor()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Create New Depositor";
        $data['package'] = DepositPackage::all();
        return view('staff.depositor-create',$data);
    }
    public function storeDepositor(Request $request)
    {
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'email_name' => 'required',
            'phone_number' => 'required',
            'present_address' => 'required',
            'permanent_address' => 'required',
            'emergency_name' => 'required',
            'emergency_phone' => 'required',
            'emergency_relationship' => 'required',
            'emergency_address' => 'required',
            'depositor_image' => 'required|mimes:png,jpg,jpeg',
            'nid_image' => 'required|mimes:png,jpg,jpeg',
            'package_id' => 'required',
            'staff_id' => 'required',
        ]);
        $depositor = Input::except('_token','_method');
        try {
            if($request->hasFile('depositor_image')){
                $image = $request->file('depositor_image');
                $filename1 = time()."h1".'.'.$image->getClientOriginalExtension();
                $location = 'images/' . $filename1;
                Image::make($image)->resize(415,530)->save($location);
                $depositor['depositor_image'] = $filename1;
            }
            if($request->hasFile('nid_image')){
                $image = $request->file('nid_image');
                $filename2 = time()."h2".'.'.$image->getClientOriginalExtension();
                $location = 'images/' . $filename2;
                Image::make($image)->save($location);
                $depositor['nid_image'] = $filename2;
            }
            $depositor['depositor_number'] = strtoupper(rand(100,999).uniqid().rand(100,999));

            $lon = Depositor::create($depositor);
            session()->flash('message', 'Depositor Created Successfully.');
            Session::flash('type', 'success');
            return redirect()->route('staff-depositor-details',$lon->id);
        } catch (\PDOException $e) {
            session()->flash('message', "Some Problem Occurs, Please Try Again!");
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function detailsDepositor($id)
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Depositor Details";
        $data['details'] = Depositor::findOrfail($id);
        return view('staff.depositor-details',$data);
    }
    public function editDepositor($id)
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Edit Depositor Details";
        $data['package'] = DepositPackage::all();
        $data['details'] = Depositor::findOrFail($id);
        return view('staff.depositor-edit',$data);
    }
    public function updateDepositor(Request $request,$id)
    {
        $lo = Depositor::findOrFail($id);
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'email_name' => 'required',
            'phone_number' => 'required',
            'present_address' => 'required',
            'permanent_address' => 'required',
            'emergency_name' => 'required',
            'emergency_phone' => 'required',
            'emergency_relationship' => 'required',
            'emergency_address' => 'required',
            'depositor_image' => 'mimes:png,jpg,jpeg',
            'nid_image' => 'mimes:png,jpg,jpeg',
            'package_id' => 'required',
            'staff_id' => 'required',
        ]);
        $loner = Input::except('_token','_method');
        try {
            if($request->hasFile('depositor_image')){
                $image = $request->file('depositor_image');
                $filename1 = time()."h1".'.'.$image->getClientOriginalExtension();
                $location = 'images/' . $filename1;
                Image::make($image)->resize(415,530)->save($location);
                $loner['depositor_image'] = $filename1;
            }
            if($request->hasFile('nid_image')){
                $image = $request->file('nid_image');
                $filename2 = time()."h2".'.'.$image->getClientOriginalExtension();
                $location = 'images/' . $filename2;
                Image::make($image)->save($location);
                $loner['nid_image'] = $filename2;
            }

            $lo->fill($loner)->save();
            session()->flash('message', 'Depositor Updated Successfully.');
            Session::flash('type', 'success');
            return redirect()->route('staff-depositor-details',$id);
        } catch (\PDOException $e) {
            session()->flash('message', "Some Problem Occurs, Please Try Again!");
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function confirmDepositor(Request $request)
    {
        $this->validate($request,[
            'id' => 'required'
        ]);
        $loner = Depositor::findOrFail($request->id);

        $now = Carbon::today();
        for ($i= 1; $i<= $loner->package->installment ; $i++) {
            $sch['loner_id'] = $loner->id;
            $sch['loner_number'] = $loner->depositor_number;
            $sch['date'] = date('d-m-Y',strtotime($now->addWeek()));
            $sch['type'] = 2;
            Schedule::create($sch);
        }
        $data['schedule'] = Schedule::whereLoner_id($loner->id)->whereLoner_number($loner->depositor_number)->paginate(1000);
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Depositor Schedule";
        return view('staff.depositor-schedule',$data);
    }
    public function showDepositor()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "All Depositor Details";
        $data['loner'] = Depositor::whereStaff_id(Auth::guard('staff')->user()->id)->orderBy('id','desc')->paginate(1000);
        return view('staff.depositor-show',$data);
    }
    public function scheduleDepositorShow($id)
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "$id Depositor Schedule";
        $data['schedule'] = Schedule::whereLoner_number($id)->paginate(1000);
        return view('staff.depositor-schedule-show',$data);
    }
    public function loanInstallment()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "All Loan Details";
        $data['loner'] = Loner::whereStaff_id(Auth::guard('staff')->user()->id)->orderBy('id','desc')->paginate(1000);
        return view('staff.loan-installment',$data);
    }
    public function loanInstallmentPay(Request $request)
    {

        $this->validate($request,[
           'id'=>'required'
        ]);
        $sh = Schedule::findOrFail($request->id);

        $sh->status = 1;
        $sh->pay_status = 1;
        $sh->save();
        session()->flash('message', 'Pay Details Successfully Updated.');
        Session::flash('type', 'success');
        return redirect()->back();
    }
    public function loanInstallmentPaid(Request $request)
    {

        $this->validate($request,[
            'id'=>'required'
        ]);
        $sh = Schedule::findOrFail($request->id);

        $sh->status = 1;
        $sh->pay_status = 2;
        $sh->save();
        session()->flash('message', 'Pay Details Successfully Updated.');
        Session::flash('type', 'success');
        return redirect()->back();
    }
    public function depositInstallment()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "All Deposit Details";
        $data['loner'] = Depositor::whereStaff_id(Auth::guard('staff')->user()->id)->orderBy('id','desc')->paginate(1000);
        return view('staff.deposit-installment',$data);
    }



}
