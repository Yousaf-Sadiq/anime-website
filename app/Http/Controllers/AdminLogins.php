<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminLogin;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminLogins extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view("Admin.login");
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

    public function dashboard()
    {


        return view("Admin.main");
    }

    public function admin_setting()
    {
        $sql["setting"] = AdminLogin::where("email", Session::get("admin_email"))->get()->toArray();
        return view("Admin.admin_setting", $sql);
    }

    public function check_admin_login(Request $req)
    {
        $rules = $req->validate([
            'email_login' => 'required',
            'password_login' => 'required',
        ], [
            'email_login.required' => 'Email  is required.',
            'password_login.required' => 'Password is required.',

        ]);

        $sql = AdminLogin::where("email", $req->email_login)->get()->toArray();

        // $sql->exists()
        if (count($sql) > 0) {
            try {
                $sql = AdminLogin::where("email", $req->email_login)->get()->toArray();
                // pre($sql[0]["password"]);
                if (Hash::check($req->password_login, $sql[0]["password"])) {
                    //    Session::put(  $session_value);
                    // pre($sql);
                    $session_name = "admin_email";
                    $session_value = $req->email_login;
                    $req->session()->put($session_name, $session_value);
                    return redirect('/dashboard')->with('login_success', 'Thanks to joining our community and keep Support us');
                } else {
                    return redirect('/admin')->with('login_error', 'password Not match');
                }
            } catch (\Throwable $th) {
                throw $th;
            }
        } else {
            return redirect('/admin')->with('fetch_error', 'Kindly enter correct credentials');
        }
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
    public function edit(Request $request)
    {

        $sql = AdminLogin::where("email", Session::get("admin_email"))->get()->toArray();
        // pre($sql);
        //
        $rules = $request->validate([
            'email_admin' => 'required|email',
            'user_name_admin' => 'required',
        ], [
            'email_admin.required' => 'Email  is required.',
            'user_name_admin.required' => 'User name is also required.',

        ]);

        if (isset($request->password_admin) && !empty($request->password_admin)) {

            $rules2 = $request->validate(
                [
                    'password_admin' => 'required|required_with:confirmPassword|same:confirmPassword',
                    'confirmPassword' => 'required',
                    // 'profile_pic' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ],
                [
                    'password_admin.required' => 'Password is not same.',
                    // 'profile_pic.required' => 'The Anime Thumbnail image  is required.',

                ]
            );
            $password = Hash::make($request->password_admin);
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

try {
    $update = AdminLogin::find($request->id);

    $update->email = $request->email_admin;
    $update->user_name = $request->user_name_admin;
    $update->password = $password;
    $update->profile = $image_name;

    $update->save();

    $session_name = "admin_email";
    $session_value = $request->email_admin;
    $request->session()->put($session_name, $session_value);

    return redirect('/admin-setting')->with('update_success', 'Your data has been updated');
} catch (\Throwable $th) {

    //throw $th;
}


    }


    public function logout()
    {
        //
        Session::forget("admin_email");

        return redirect('/admin')->with('logout_success', 'Logout successfull');
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
    public function destroy($id)
    {
        //
    }
}
