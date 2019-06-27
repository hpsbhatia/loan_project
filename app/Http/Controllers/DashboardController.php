<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Currency;
use App\Date;
use App\Depositor;
use App\DepositPackage;
use App\LoanPackage;
use App\Loner;
use App\Member;
use App\Method;
use App\Order;
use App\Payment;
use App\Process;
use App\Room;
use App\Schedule;
use App\Service;
use App\Signal;
use App\Staff;
use App\Testimonial;
use App\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\GeneralSetting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use DateTime;

class DashboardController extends Controller
{
    public function __construct()
    {
        $data = [];
        $this->middleware('auth:admin');
        $general_all = GeneralSetting::first();
        $this->site_title = $general_all->title;
        $this->gen_phone = $general_all->number;
        $this->gen_email = $general_all->email;
        $this->site_color = $general_all->color;

    }
    public function getDashboard()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Dashboard";
        $data['total_loan'] = LoanPackage::all()->count();
        $data['total_deposit'] = DepositPackage::all()->count();
        $data['total_loner'] = Loner::all()->count();
        $data['total_depositor'] = Depositor::all()->count();
        return view('dashboard.dashboard',$data);
    }

    public function createCurrency()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Create Currency";
        return view('dashboard.currency-create',$data);
    }

    public function storeCurrency(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:currencies,name',
            'rate' => 'required'
        ]);
        try {
            $curr = Input::except('_method','_token');
            Currency::create($curr);
            session()->flash('message', 'Currency Create Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }

    public function showCurrency()
    {
        $general = GeneralSetting::first();
        $data['site_title'] = $general->title;
        $data['page_title'] = "All Currency";
        $data['currency'] = Currency::orderBy('id','ASC')->paginate(100);
        return view('dashboard.currency-show',$data);
    }

    public function editCurrency($id)
    {
        $general = GeneralSetting::first();
        $data['site_title'] = $general->title;
        $data['page_title'] = "Edit Currency";
        $data['currency'] = Currency::findOrFail($id);
        return view('dashboard.currency-edit',$data);

    }

    public function calcLend()
    {
        
        return view('dashboard.lend-calculate');

    }

    public function updateCurrency(Request $request,$id)
    {
        $curr = Currency::findOrFail($id);
        $this->validate($request,[
            'name' => 'required|unique:currencies,name,'.$curr->id,
            'rate' =>'required'
        ]);
        try {
            $currency = Input::except('_method','_token');
            $curr->fill($currency)->save();
            session()->flash('message', 'Currency Updated Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function deleteCurrency(Request $request)
    {
        try {
            if ($request->input('id') === '') {
                session()->flash('message', 'Oops, bad request!');
                Session::flash('type', 'danger');
                return redirect()->back();
            }else{
                $currency = Currency::findOrFail($request->input('id'));
                $currency->delete();
                session()->flash('message', 'Currency Deleted Successfully.');
                Session::flash('type', 'success');
                return redirect()->back();
            }

        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }

    public function mangeTestimonial()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Mange Testimonial";
        $data['test'] = Testimonial::all();
        return view('dashboard.testimonial-manage',$data);
    }
    public function storeTestimonial(Request $request)
    {
        $this->validate($request,[
           'name' => 'required',
            'description' => 'required'
        ]);
        Testimonial::create($request->all());
        session()->flash('message', 'Testimonial Created Successfully.');
        Session::flash('type', 'success');
        return redirect()->back();
    }
    public function editTestimonial($id)
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Mange Testimonial";
        $data['testimonial'] = Testimonial::findOrFail($id);
        $data['test'] = Testimonial::all();
        return view('dashboard.testimonial-edit',$data);
    }
    public function updateTestimonial(Request $request,$id)
    {
        $this->validate($request,[
           'name' => 'required',
            'description' => 'required'
        ]);
        $test = Testimonial::findOrFail($id);
        $test->fill($request->all())->save();
        session()->flash('message', 'Testimonial Updated Successfully.');
        Session::flash('type', 'success');
        return redirect()->back();
    }
    public function deleteTestimonial(Request $request)
    {
        try {
            if ($request->input('id') === '') {
                session()->flash('message', 'Oops, bad request!');
                Session::flash('type', 'danger');
                return redirect()->back();
            }else{
                Testimonial::destroy($request->input('id'));
                session()->flash('message', 'Testimonial Deleted Successfully.');
                Session::flash('type', 'success');
                return redirect()->back();
            }

        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }

    public function createRoom()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Create New Room";
        $data['currency'] = Currency::all();
        $data['category'] = Category::all();
        return view('dashboard.room-create',$data);
    }
    public function storeRoom(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'price' =>'required',
            'currency_id' =>'required',
            'category_id' =>'required'
        ]);
        try {
            $service = Input::except('_token','_method');
            Room::create($service);
            session()->flash('message', 'Room Created Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();

        } catch (\PDOException $e) {
            session()->flash('message', "Some Problem Occurs, Please Try Again!");
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function showRoom()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "All Room";
        $data['room'] = Room::with('currency','category')->orderBy('id','DESC')->paginate(8);
        return view('dashboard.room-show',$data);
    }
    public function editRoom($id)
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Edit Room";
        $data['service'] = Room::findOrFail($id);
        $data['currency'] = Currency::all();
        $data['category'] = Category::all();
        return view('dashboard.room-edit',$data);
    }
    public function updateRoom(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required',
            'price' =>'required',
            'category_id' =>'required',
            'currency_id' =>'required',
        ]);
        $service = Room::findOrFail($id);
        try {
            $ser = Input::except('_token','_method');
            $service->fill($ser)->save();
            session()->flash('message', 'Room Updated Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();

        } catch (\PDOException $e) {
            session()->flash('message', "Some Problem Occurs, Please Try Again!");
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function deleteRoom(Request $request)
    {
        try {
            if ($request->input('id') === '') {
                session()->flash('message', 'Oops, bad request!');
                Session::flash('type', 'danger');
                return redirect()->back();
            }else{
                $service = Room::findOrFail($request->input('id'));
                //$service->signals()->detach();
                $service->delete();
                session()->flash('message', 'Room Deleted Successfully.');
                Session::flash('type', 'success');
                return redirect()->back();
            }

        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }

    public function createLoanPackage()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Create New Loan Package";
        $data['currency'] = Currency::all();
        $data['type'] = Type::all();
        return view('dashboard.loan-create',$data);
    }
    public function storeLoanPackage(Request $request)
    {
        $this->validate($request,[
           'name' => 'required|unique:loan_packages,name',
            'currency_id' => 'required',
            'amount' => 'required',
            'installment' => 'required',
            'fine' => 'required',
            'percentage' => 'required',
            'type_id' => 'required',
            'rate' => 'required',
        ]);
        try {
            LoanPackage::create($request->all());
            session()->flash('message', 'Loan Package Created Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();

        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }

    }
    public function showLoanPackage()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Show All Loan Package";
        $data['loan'] = LoanPackage::orderBy('id','DESC')->paginate(6);
        return view('dashboard.loan-show',$data);
    }
    public function editLoanPackage($id)
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Edit Loan Package";
        $data['loan'] = LoanPackage::findOrFail($id);
        $data['currency'] = Currency::all();
        $data['type'] = Type::all();
        return view('dashboard.loan-edit',$data);
    }
    public function updateLoanPackage(Request $request,$id)
    {
        $loan = LoanPackage::findOrFail($id);
        $this->validate($request,[
            'name' => 'required|unique:loan_packages,name,'.$loan->id,
            'currency_id' => 'required',
            'amount' => 'required',
            'installment' => 'required',
            'fine' => 'required',
            'percentage' => 'required',
            'type_id' => 'required',
            'rate' => 'required',
        ]);
        try {
            $loan->fill($request->all())->save();
            session()->flash('message', 'Loan Package Updated Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();

        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function createDepositPackage()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Create New Deposit Package";
        $data['currency'] = Currency::all();
        $data['type'] = Type::all();
        return view('dashboard.deposit-create',$data);
    }
    public function storeDepositPackage(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:loan_packages,name',
            'currency_id' => 'required',
            'amount' => 'required',
            'installment' => 'required',
            'fine' => 'required',
            'percentage' => 'required',
            'type_id' => 'required',
            'rate' => 'required',
        ]);
        try {
            DepositPackage::create($request->all());
            session()->flash('message', 'Deposit Package Created Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();

        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }

    }
    public function showDepositPackage()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Show All Deposit Package";
        $data['loan'] = DepositPackage::orderBy('id','DESC')->paginate(6);
        return view('dashboard.deposit-show',$data);
    }
    public function editDepositPackage($id)
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Edit Deposit Package";
        $data['loan'] = DepositPackage::findOrFail($id);
        $data['currency'] = Currency::all();
        $data['type'] = Type::all();
        return view('dashboard.deposit-edit',$data);
    }
    public function updateDepositPackage(Request $request,$id)
    {
        $loan = DepositPackage::findOrFail($id);
        $this->validate($request,[
            'name' => 'required|unique:loan_packages,name,'.$loan->id,
            'currency_id' => 'required',
            'amount' => 'required',
            'installment' => 'required',
            'fine' => 'required',
            'percentage' => 'required',
            'type_id' => 'required',
            'rate' => 'required',
        ]);
        try {
            $loan->fill($request->all())->save();
            session()->flash('message', 'Deposit Package Updated Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();

        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function createType()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Create New Installment Type";
        return view('dashboard.type-create',$data);
    }
    public function storeType(Request $request)
    {
        $this->validate($request,[
           'name' => 'required|unique:types,name',
            'day' => 'required'
        ]);
        Type::create($request->all());
        session()->flash('message', 'Installment Type Created Successfully.');
        Session::flash('type', 'success');
        return redirect()->back();
    }
    public function showType()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Show All Installment Type";
        $data['type'] = Type::orderBy('id','desc')->paginate(1000);
        return view('dashboard.type-show',$data);
    }
    public function editType($id)
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Edit Installment Type";
        $data['type'] = Type::findOrFail($id);
        return view('dashboard.type-edit',$data);
    }
    public function updateType(Request $request,$id)
    {
        $type = Type::findOrFail($id);
        $this->validate($request,[
            'name' => 'required|unique:types,name,'.$type->id,
            'day' => 'required'
        ]);
        $type->fill($request->all())->save();
        session()->flash('message', 'Installment Type Updated Successfully.');
        Session::flash('type', 'success');
        return redirect()->back();
    }
    public function createStaff()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Create New Staff";
        return view('dashboard.staff-create',$data);
    }
    public function storeStaff(Request $request)
    {
        $this->validate($request,[
           'name' => 'required',
            'email' => 'required|email|unique:staff,email',
            'username' => 'required|min:6|unique:staff,username',
            'phone' => 'required|numeric|unique:staff,phone',
            'password' => 'required|min:5|max:32|confirmed',
            'status' => 'required'
        ]);
        $staff = Input::except('_token','_method');
        $staff['password'] = Hash::make($request->password);
        Staff::create($staff);
        session()->flash('message', 'Staff Created Successfully.');
        Session::flash('type', 'success');
        return redirect()->back();
    }
    public function showStaff()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "View All Staff";
        $data['staff'] = Staff::orderBy('id','DESC')->paginate(1000);
        return view('dashboard.staff-show',$data);
    }
    public function deActiveStaff($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->status = 0;
        $staff->save();
        session()->flash('message', 'Staff DeActivated Successfully.');
        Session::flash('type', 'success');
        return redirect()->back();
    }
    public function ActiveStaff($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->status = 1;
        $staff->save();
        session()->flash('message', 'Staff Activated Successfully.');
        Session::flash('type', 'success');
        return redirect()->back();
    }
    public function editStaff($id)
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "View All Staff";
        $data['staff'] = Staff::findOrFail($id);
        return view('dashboard.staff-edit',$data);
    }
    public function updateStaff(Request $request,$id)
    {
        $staff = Staff::findOrFail($id);
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|unique:staff,email,'.$staff->id,
            'username' => 'required|min:6|unique:staff,username,'.$staff->id,
            'phone' => 'required|numeric|unique:staff,phone,'.$staff->id,
            'status' => 'required'
        ]);
        $staff->fill($request->all())->save();
        session()->flash('message', 'Staff Updated Successfully.');
        Session::flash('type', 'success');
        return redirect()->back();
    }
    public function passwordChangeStaff(Request $request)
    {
        $this->validate($request,[
           'id' => 'required',
            'password' => 'required|confirmed'
        ]);
        $staff = Staff::findOrFail($request->id);
        $staff->password = Hash::make($request->password);
        $staff->save();
        session()->flash('message', 'Staff Password Change Successfully.');
        Session::flash('type', 'success');
        return redirect()->back();
    }
    public function createLend()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Create New Loaner";
        $data['staff'] = Staff::all();
        $data['package'] = LoanPackage::all();
        return view('dashboard.lend-create',$data);
    }
    public function storeLend(Request $request)
    {

        $this->validate($request,[
           'first_name' => 'required',
           'last_name' => 'required',
           'birth_date' => 'required',
           'father_name' => 'required',
           'mother_name' => 'required',
           'salary' => 'required',
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
            $loner['rating'] = (rand(7000,8599)/10000);
            $lon = Loner::create($loner);
            session()->flash('message', 'Loner Created Successfully.');
            Session::flash('type', 'success');
            /*return redirect()->back();*/
            return redirect()->route('loner-details',$lon->id);
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
        return view('dashboard.lend-details',$data);
    }
    public function editLend($id)
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Edit Loan Details";
        $data['staff'] = Staff::all();
        $data['package'] = LoanPackage::all();
        $data['details'] = Loner::findOrFail($id);
        return view('dashboard.lend-edit',$data);
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
            /*return redirect()->back();*/
            return redirect()->route('loner-details',$id);
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
        return view('dashboard.loan-schedule',$data);
    }
    public function showLend()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "All Loaner Details";
        $data['loner'] = Loner::orderBy('id','desc')->paginate(1000);
        return view('dashboard.lender-show',$data);
    }
    public function scheduleLoanShow($id)
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "$id Loan Schedule";
        $data['schedule'] = Schedule::whereLoner_number($id)->paginate(1000);
        return view('dashboard.loan-schedule-show',$data);
    }
    public function createDepositor()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Create New Depositor";
        $data['staff'] = Staff::all();
        $data['package'] = DepositPackage::all();
        return view('dashboard.depositor-create',$data);
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
            /*return redirect()->back();*/
            return redirect()->route('depositor-details',$lon->id);
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
        return view('dashboard.depositor-details',$data);
    }
    public function editDepositor($id)
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Edit Depositor Details";
        $data['staff'] = Staff::all();
        $data['package'] = DepositPackage::all();
        $data['details'] = Depositor::findOrFail($id);
        return view('dashboard.depositor-edit',$data);
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
            return redirect()->route('depositor-details',$id);
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
        return view('dashboard.depositor-schedule',$data);
    }
    public function showDepositor()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "All Depositor Details";
        $data['loner'] = Depositor::orderBy('id','desc')->paginate(1000);
        return view('dashboard.depositor-show',$data);
    }
    public function scheduleDepositorShow($id)
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "$id Depositor Schedule";
        $data['schedule'] = Schedule::whereLoner_number($id)->paginate(1000);
        return view('dashboard.depositor-schedule-show',$data);
    }
    public function loanInstallment()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "All Loan Details";
        $data['schedule'] = Schedule::where('status','=',1)->whereType(1)->orderBy('updated_at','desc')->paginate(1000);
        return view('dashboard.loan-installment',$data);
    }
    public function loanInstallmentPay(Request $request)
    {

        $this->validate($request,[
            'id'=>'required'
        ]);
        $sh = Schedule::findOrFail($request->id);

        $sh->paid_status = 1;
        $sh->save();
        session()->flash('message', 'Loaner Details Successfully Updated.');
        Session::flash('type', 'success');
        return redirect()->back();
    }
    public function depositInstallment()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "All Deposit Details";
        $data['schedule'] = Schedule::where('status','=',1)->whereType(2)->orderBy('updated_at','desc')->paginate(1000);
        return view('dashboard.depositor-installment',$data);
    }



}
