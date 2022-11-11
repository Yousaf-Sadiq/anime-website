<?php

namespace App\Http\Controllers;

use App\Models\userPanel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class userHandling extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sql["user_setting"] = userPanel::where("email", Session::get("user_email"))->get();

        return view("user-setting", $sql);
    }

    public function Edit_admin_user($id)
    {

        $sql["edit_user"] = userPanel::where("id", $id)->get();

        return view("Admin.Edit_admin_user", $sql);
    }

    public function Update_admin_user($id, Request $request)
    {

        $rules = $request->validate([
            'user_id' => 'required',
            'user_status' => 'required',
        ], [
            'user_id.required' => 'Email  is required.',
            'user_status.required' => 'Status is also required.',
        ]);

        $insert = userPanel::find($request->id);
        $insert->status = $request->user_status;

        $insert->save();

        return redirect("all-user")->with("update_status",$insert->user_name." "."This user data has been updated");
    }

    public function admin_handler()
    {

        $sql["all_user"] = userPanel::paginate(10);

        return view("Admin.all_users", $sql);
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
        //
        $rules = $request->validate([
            'email' => 'required|email|unique:user_panels,email',
            'user_name' => 'required',
            'password' => 'required|required_with:confirmPassword|same:confirmPassword',
            'confirmPassword' => 'required',
            'profile_pic' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ], [
            'email.required' => 'Email  is required.',
            'user_name.required' => 'User name is also required.',
            'password.required' => 'Password is not same.',
            'profile_pic.required' => 'The Anime Thumbnail image  is required.',

        ]);

        // app('App\Http\Controllers\validateEmail')->setStreamTimeoutWait(20);
        // app('App\Http\Controllers\validateEmail')->Debug = false;
        // app('App\Http\Controllers\validateEmail')->setEmailFrom($request->email);
        // $check_emails = app('App\Http\Controllers\validateEmail')->check($request->email);

        // if ($check_emails) {
        //     # code...

        $sql = userPanel::where([
            "email" => $request->email,

        ]);

        if ($sql->exists()) {
            return redirect('/login')->with('fetch_error', 'email already taken,Kindly enter Valid email');
        } else {
            $image_name = rand(1, 100) . "_" . $request->file('profile_pic')->getClientOriginalName();

            $image_path = $request->file('profile_pic')->storeAs('public/profile', $image_name);
            $password = Hash::make($request->password);
            $insert = new userPanel();
            $insert->email = $request->email;
            $insert->user_name = $request->user_name;
            $insert->password = $password;
            $insert->profile = $image_name;

            $insert->save();

            $session_name = "user_email";
            $session_value = $request->email;
            $request->session()->put($session_name, $session_value);
            // Session::put(  $session_value);
            return redirect('/login')->with('registor_success', 'Thanks to joining our community and keep Support us');
        }
        // }
        // else if ( app('App\Http\Controllers\validateEmail')::validates($request->email)) {
        //     return redirect('/login')->with('fetch_error', 'Kindly enter Valid email');
        // }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function check_login(Request $req)
    {
        //
        $rules = $req->validate([
            'email_login' => 'required',
            'password_login' => 'required',
        ], [
            'email_login.required' => 'Email  is required.',
            'password_login.required' => 'Password is required.',

        ]);

        $sql = userPanel::where([
            "email" => $req->email_login,
            "status" => "1",
        ]);

        if ($sql->exists()) {

            $sql = userPanel::where("email", $req->email_login)->get()->toArray();
            if (Hash::check($req->password_login, $sql[0]["password"])) {
                //    Session::put(  $session_value);
                // pre($sql);
                $session_name = "user_email";
                $session_value = $req->email_login;
                $req->session()->put($session_name, $session_value);
                return redirect('/login')->with('login_success', 'Thanks to joining our community and keep Support us');
            } else {
                return redirect('/login')->with('login_error', 'password Not match');
            }
        } else {
            return redirect('/login')->with('fetch_error', 'You are not registor,Please registor first');
        }
    }

    public function logout()
    {
        //
        Session::forget("user_email");

        return redirect('/login')->with('logout_success', 'Logout successfull');
    }

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
    public function edit(Request $request)
    {

        $sql = userPanel::where("email", Session::get("user_email"))->get()->toArray();
        // pre($sql);
        //
        $rules = $request->validate([
            'email' => 'required',
            'user_name' => 'required',

        ], [
            'email.required' => 'Email  is required.',
            'user_name.required' => 'User name is also required.',

        ]);

        if (isset($request->password) && !empty($request->password)) {

            $rules2 = $request->validate(
                [
                    'password' => 'required|required_with:confirmPassword|same:confirmPassword',
                    'confirmPassword' => 'required',
                    // 'profile_pic' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ],
                [
                    'password.required' => 'Password is not same.',
                    // 'profile_pic.required' => 'The Anime Thumbnail image  is required.',

                ]
            );
            $password = Hash::make($request->password);
        } else {

            $password = $sql[0]["password"];
        }

        if (!empty($request->hasFile("profile_pic"))) {

            $rules3 = $request->validate([

                'profile_pic' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ], [

                'profile_pic.required' => 'The Anime Thumbnail image  is required.',

            ]);

            // $filename = public_path().'/storage/public/profile/'.$sql[0]["profile"];
            $abc = Storage::delete('/public/profile/' . $sql[0]["profile"]);
            // $abc= File::delete($filename);
            // dd($abc);
            $image_name = rand(1, 100) . "_" . $request->file('profile_pic')->getClientOriginalName();

            $image_path = $request->file('profile_pic')->storeAs('public/profile', $image_name);
        } else {

            $image_name = $sql[0]["profile"];
        }

        $update = userPanel::find($request->id);

        $update->email = $request->email;
        $update->user_name = $request->user_name;
        $update->password = $password;
        $update->profile = $image_name;

        $update->save();

        $session_name = "user_email";
        $session_value = $request->email;
        $request->session()->put($session_name, $session_value);

        return redirect('/user-setting')->with('login_success', 'Your data has been updated');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function inActive($id)
    {
        $update = userPanel::find($id);
        $update->status = "0";
        $update->save();
        Session::forget("user_email");

        return redirect('/login')->with('logout_success', 'your Account has been deleted,For recovery contact this email ysadiq464@gmail.com');
    }

    public function destroy($id)
    {
        //
    }
}
