<?php

namespace App\Http\Controllers;

use App\Article;
use App\Date;
use App\DepositPackage;
use App\GeneralSetting;
use App\LoanPackage;
use App\Member;
use App\Menu;
use App\Method;
use App\Order;
use App\Payment;
use App\Room;
use App\Schedule;
use App\Service;
use App\Signal;
use App\Slider;
use App\Testimonial;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use DatePeriod;

use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    public function __construct()
    {
        $data = [];
        $general_all = GeneralSetting::first();
        $this->site_title = $general_all->title;
        $this->site_email = $general_all->email;
        $this->site_color = $general_all->color;
        $this->footer_text = $general_all->footer_text;
        $this->top_text = $general_all->top_text;
        $this->paypal_email = $general_all->paypal_email;
        $this->footer_bottom_text = $general_all->footer_bottom_text;
    }
    public function getHome()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Home Page';
        $data['site_color'] = $this->site_color;
        $data['footer_text'] = $this->footer_text;
        $data['footer_bottom_text'] = $this->footer_bottom_text;
        $data['top_text'] = $this->top_text;
        $data['menu'] = Menu::all();
        $data['slider'] = Slider::all();
        /*$data['total_signal'] = Signal::all()->count();
        $data['total_user'] = Member::all()->count();
        $data['total_article'] = Article::all()->count();
        $data['total_package'] = Service::all()->count();*/
        $data['loan'] = LoanPackage::with('currency','type')->orderBy('id','ASC')->get();
        $data['deposit'] = DepositPackage::with('currency','type')->orderBy('id','ASC')->get();
        $data['test'] = Testimonial::inRandomOrder()->take(6)->get();
        return view('home.home',$data);
    }

    public function menu($id)
    {
        $menu = Menu::findOrFail($id);
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Menu';
        $data['site_color'] = $this->site_color;
        $data['footer_text'] = $this->footer_text;
        $data['footer_bottom_text'] = $this->footer_bottom_text;
        $data['top_text'] = $this->top_text;
        $data['menu_name'] = $menu->name;
        $data['menu_description'] = $menu->description;
        $data['menu'] = Menu::all();
        return view('home.menu',$data);
    }

    public function getContact()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Contact Us';
        $data['site_color'] = $this->site_color;
        $data['footer_text'] = $this->footer_text;
        $data['footer_bottom_text'] = $this->footer_bottom_text;
        $data['menu'] = Menu::all();
        $data['general'] = GeneralSetting::first();
        return view('home.contact-us',$data);
    }
    public function postContact(Request $request)
    {
        $to = $this->site_email;
        $subject = "Contact Message ";
        $msg = "$request->message";
        $name = "$request->name";
        $email = $request->email;

        $headers = "From: $name <$email> \r\n";
        $headers .= "Reply-To: $name <$email> \r\n";
        $headers .='X-Mailer: PHP/' . phpversion();
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

        $message = "
                    <html>
                    <head>
                    <title>Contact Message</title>
                    </head>
                    <body>
                    <p>$msg</p>
                    </body>
                    </html>
                    ";
        if (mail($to, $subject, $message, $headers)) {
            session()->flash('message', 'Message Send Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();
        } else {
            session()->flash('message', 'Message Not Successfully.');
            Session::flash('type', 'warning');
            return redirect()->back();
        }
    }
    public function searchSchedule(Request $request)
    {
        $this->validate($request,[
           'number' => 'required',
            'email' => 'email|required'
        ]);
        $sch = Schedule::whereLoner_number($request->number)->count();
        if ($sch)
        {
            $schedule = Schedule::whereLoner_number($request->number)->first();
            $type = $schedule->type;
            if ($type == 2){
                $email = $schedule->depositor->email_name;
                if ($email == $request->email){
                    $data['site_title'] = $this->site_title;
                    $data['page_title'] = 'Loner Schedule';
                    $data['site_color'] = $this->site_color;
                    $data['footer_text'] = $this->footer_text;
                    $data['footer_bottom_text'] = $this->footer_bottom_text;
                    $data['top_text'] = $this->top_text;
                    $data['menu'] = Menu::all();
                    $data['type'] = 2;
                    $data['schedule'] = Schedule::whereLoner_number($request->number)->orderBy('id','asc')->get();
                    return view('home.schedule',$data);
                }else{
                    session()->flash('message', 'Not Match with Our Record..!');
                    Session::flash('type', 'warning');
                    return redirect()->back();
                }

            }else{

                $email = $schedule->loner->email_name;
                if ($email == $request->email){
                    $data['site_title'] = $this->site_title;
                    $data['page_title'] = 'Loner Schedule';
                    $data['site_color'] = $this->site_color;
                    $data['footer_text'] = $this->footer_text;
                    $data['footer_bottom_text'] = $this->footer_bottom_text;
                    $data['top_text'] = $this->top_text;
                    $data['menu'] = Menu::all();
                    $data['type'] = 1;
                    $data['schedule'] = Schedule::whereLoner_number($request->number)->orderBy('id','asc')->get();
                    return view('home.schedule',$data);
                }else{
                    session()->flash('message', 'Not Match with Our Record..!');
                    Session::flash('type', 'warning');
                    return redirect()->back();
                }
            }

        }else{
            session()->flash('message', 'Not Match with Our Record..!');
            Session::flash('type', 'warning');
            return redirect()->back();
        }


    }


}
