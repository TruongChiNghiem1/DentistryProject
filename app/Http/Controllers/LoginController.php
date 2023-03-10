<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PatientsRequest;
use App\Mail\Notifymail;
use Mail;

class LoginController extends Controller
{
    public function getlogin() {
        return view('login.index');
    }
    public function postlogin(LoginRequest $request) {
        
        //admin
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => 1
        ];

        //Điều dưỡng
        $login2 = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => 2
        ];

        //Super admin
        $login3 = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => 4
        ];

        if (Auth::attempt($login)) {
            
            $request->session()->regenerate();
            // Authentication passed...
            return redirect()->route('admin.information.calendars.index');
        } else if (Auth::attempt($login2)) {
            $request->session()->regenerate();
            // Authentication passed...
            return redirect()->route('admin.information.calendars.index');
        } else if (Auth::attempt($login3)) {
            $request->session()->regenerate();
            // Authentication passed...
            return redirect()->route('admin.information.calendars.index');
        }
        return back()->with([
            'error' => 'Tài khoản hoặc mật khẩu không chính xác',
        ]);
    }

    

    public function getloginpatients () {
        return view('login.patients');
    }

    public function postloginpatients(LoginRequest $request) {
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => 3
        ];

        if (Auth::attempt($login)) {
            if(Auth::user()->level == 3){
                if (Auth::user()->email_verified_at != null){
                    $request->session()->regenerate();
                    return redirect()->route('website.index');
                } else if(Auth::user()->email_verified_at == null && Auth::user()->online == 1 ) {
                    $request->session()->regenerate();
                    return redirect()->route('website.index');
                } else {
                    return back()->with([
                        'error' => 'Tài khoản này chưa được xác nhận (Vui lòng kiểm tra email sau đó nhấn xác nhận)',
                    ]);
                }
                return redirect()->royte('website.index');
            } 
            
            
            // else {
            //     Auth::logout();
            //     $request->session()->invalidate();
            //     $request->session()->regenerateToken();

            //     return redirect()->route('postloginpatients');
            // }
        }

        return back()->with([
            'error' => 'Tài khoản hoặc mật khẩu không chính xác',
        ]);
    }

    public function getregister()
    {
         return view('login.register');
    }

    public function postregister(PatientsRequest $request)
    {
        $data = $request->except('_token', 'password_confirmation', 'avatar');
        $data['password'] = bcrypt($request->password);
        $data['created_at'] = new \DateTime();
        
        $data['uuid'] = Str::uuid();
        
        $data['level'] = 3;
        $data['online'] = 2;
        $result = DB::table('users')->insert($data);

        $data2 = $request->except('_token', 'password_confirmation', 'avatar', 'password', 'name', 'email');
        $data2['uuid'] = $data['uuid'];
        DB::table('patients')->insert($data2);

        if($result){
            Mail::to($request->email)->send(new Notifymail($data));
            return view('login/send-mail');
        }
    }

    public function verify($uuid)
        {
            $data =DB::table('users')->where('uuid', $uuid)->first();

            if($data->email_verified_at == null){
                DB::table('users')->where('uuid', $uuid)->update(['email_verified_at' => new \DateTime()]);
        
                return view('login.successful');
            }else {
                return redirect()->route('website.index');
            }
    }

    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
        return redirect()->route('getlogin');
    }

    public function logoutpatient(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
        return redirect()->route('getloginpatients');
    }
}


